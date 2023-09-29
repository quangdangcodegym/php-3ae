<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerControllerAPI;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/customers', [CustomerControllerAPI::class, 'index'])->name('customers.all');
Route::get('/customers/{customerId}', [CustomerControllerAPI::class, 'show'])->name('customers.show');
Route::post('/customers', [CustomerControllerAPI::class, 'store'])->name('customers.store');
Route::put('/customers/{customerId}', [CustomerControllerAPI::class, 'update'])->name('customers.update');
Route::delete('/customers/{customerId}', [CustomerControllerAPI::class, 'destroy'])->name('customers.destroy');


Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'role:writer'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});
