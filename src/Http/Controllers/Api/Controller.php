<?php

namespace Pratiksh\Adminetic\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (! empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function filter(Request $request, $query)
    {
        // Where Search
        if ($request->has('where')) {
            $where = json_decode(str_replace(' ', '', str_replace("'", '"', $request->where)), true);
            $query->where($where);
        }

        // orWhere Search
        if ($request->has('orWhere')) {
            $orWhere = json_decode(str_replace(' ', '', str_replace("'", '"', $request->orWhere)), true);
            $query->orWhere($orWhere);
        }

        // Order By
        if ($request->has('orderBy')) {
            $query->orderBy($request->orderBy, $request->order ? $request->order : 'asc');
        }

        // Limit
        if ($request->has('limit')) {
            $query->limit((int) $request->limit);
        }

        return $query;
    }
}
