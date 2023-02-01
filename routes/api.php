<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return response()->json([
        'status' => 'error',
        'http_code' => '404',
        'message' => 'uri not found',
    ], 404);
});
