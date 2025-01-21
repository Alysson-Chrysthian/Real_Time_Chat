<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ChatController extends Controller
{

    public function send(Request $request) 
    {
        $request->validate([
            "message" => ["required", "string"],
            'user_id' => ['required', 'integer'],
        ]);

        SendMessage::dispatch($request->message, $request->user_id);
    }

}