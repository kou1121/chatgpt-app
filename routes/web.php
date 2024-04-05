<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatGPTController;

Route::get('/ask', function () {
    return view('ask');
});

Route::post('/ask', [ChatGPTController::class, 'ask']);