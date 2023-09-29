<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class MusicNotFoundException extends Exception
{
    public function report()
    {
        Log::debug('Music not found');
    }

    public function render($request)
    {
        // dd('chạy vào đây class product not found');
        $message = $this->message;
        return response()->view('musics.not-found', compact('message'));
    }

    public function __construct($message)
    {
        $this->message = $message;
    }
}
