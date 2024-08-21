<?php
namespace App\Helpers;


class ApiResponse
{
    static function sendResponse($data = [], $msg = null, $status = 200)
    {
        $response = [
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ];
        return response()->json($response, $status);
    }
}