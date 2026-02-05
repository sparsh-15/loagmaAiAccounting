<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'name' => 'Invoice OCR Enterprise API',
        'version' => '1.0',
    ]);
});
