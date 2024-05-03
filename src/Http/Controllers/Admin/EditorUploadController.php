<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditorUploadController extends Controller
{
    // public function upload(Request $request)
    // {
    //     if ($request->hasFile('upload')) {
    //         $originName = $request->file('upload')->getClientOriginalName();
    //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //         $extension = $request->file('upload')->getClientOriginalExtension();
    //         $fileName = $fileName.'_'.time().'.'.$extension;

    //         $request->file('upload')->move(public_path('storage/editorimages'), $fileName);

    //         $CKEditorFuncNum = $request->input('CKEditorFuncNum');
    //         $url = asset('storage/editorimages/'.$fileName);
    //         $msg = 'Image uploaded successfully';
    //         $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

    //         @header('Content-type: text/html; charset=utf-8');

    //         return $response;

    //         return response()->json(['uploaded' => 1, 'fileName' => $fileName, 'url' => $url]);
    //     }
    // }
    public function upload(Request $request)
    {
        // Ensure a file was uploaded
        if (!$request->hasFile('upload')) {
            return response()->json(['uploaded' => 0, 'error' => ['message' => 'No file was uploaded.']], 400);
        }

        $file = $request->file('upload');

        // Validate file type to ensure it's an image
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = $file->getClientOriginalExtension();
        if (!in_array(strtolower($extension), $allowedExtensions)) {
            return response()->json(['uploaded' => 0, 'error' => ['message' => 'Invalid file type.']], 400);
        }

        // Generate a unique file name
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;

        try {
            // Ensure the upload directory exists and has correct permissions
            $uploadDir = public_path('storage/editorimages');
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0775, true); // Create directory if it doesn't exist
            }

            // Move the file to the upload directory
            $file->move($uploadDir, $fileName);

            // Build the URL for the uploaded file
            $fileUrl = asset('storage/editorimages/' . $fileName);

            // Check if the request contains the CKEditor function number
            if ($request->has('CKEditorFuncNum')) {
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $msg = 'Image uploaded successfully';
                // Return the JavaScript response for 'form' upload method
                return response("<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$fileUrl', '$msg');</script>")->header('Content-type', 'text/html; charset=utf-8');
            }

            // Return JSON response for 'xhr' upload method
            return response()->json(['uploaded' => 1, 'fileName' => $fileName, 'url' => $fileUrl]);

        } catch (\Exception $e) {
            return response()->json(['uploaded' => 0, 'error' => ['message' => 'Upload failed: ' . $e->getMessage()]], 500);
        }
    }
}
