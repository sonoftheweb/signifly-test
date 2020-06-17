<?php


namespace App\Http\Controllers\Traits;


trait ApiResponse
{
    public function respondWithSuccess($msg = null)
    {
        $msg = (!$msg) ? 'Operation successful' : $msg;

        return response([
            'status' => 'success',
            'message' => $msg
        ], 200);
    }
}
