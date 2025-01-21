<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'chat')
    ->name('chat');

Route::post('/send', [ChatController::class, 'send'])
    ->name('message.send');