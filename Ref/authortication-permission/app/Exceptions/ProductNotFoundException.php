<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProductNotFoundException extends Exception
{
    protected $message;
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        Log::debug('User not found');
    }

    public function render($request)
    {
        // dd('chạy vào đây class product not found');
        $message = $this->message;
        return response()->view('not-found', compact('message'));
    }

    public function __construct($message)
    {
        $this->message = $message;
    }
}
