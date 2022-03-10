<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FontAwesomeController extends Controller
{
    public function index()
    {
        $file_path = public_path().'/adminetic/assets/js/icon-picker/iconpicker-1.5.0.json';
        $fonts = file_exists($file_path) ? json_decode(file_get_contents($file_path), true) : null;

        return view('adminetic::admin.fontawesome.index', compact('fonts'));
    }
}
