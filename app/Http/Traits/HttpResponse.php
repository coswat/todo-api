<?php

namespace App\Http\Traits;

trait HttpResponse
{
    protected function error($data, string $message, int $code = 401)
    {
        return response()->json([
            'status' => 'An error has been occurred..',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function success($data = null, string $message = null, int $code = 200)
    {
        return response()->json([
            'status' => 'Request was successful',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function internalError($message)
    {
        return response()->json([
            'status' => 'Internal Server Error',
            'message' => $message,
        ], 500);
    }
}
