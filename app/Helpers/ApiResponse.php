<?php



class ApiResponse
{
    static function sendResponse($code = null, $msg = null, $data = null)
    {
        $response = [
            'status' => $code,
            'message' => $msg,
            'data' => $data

        ];

        return response()->json($response, $code);
    }
}
