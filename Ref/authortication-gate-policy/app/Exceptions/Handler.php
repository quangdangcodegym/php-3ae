<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
        });
    }
    public function render($request, Throwable $e)
    {
        /*
            Có thể kiểm tra instance của từng ngoại lệ rồi xử lý logic ở đây
            if ($e instanceof ProductNotFoundException) {
                return response()->view('products.not-found');
            }
        */
        // dd('chạy vào đây handle lớp cha');
        return parent::render($request, $e);
    }
}
