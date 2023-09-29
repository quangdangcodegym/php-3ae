<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductxController;
use App\Http\Controllers\ProductiController;

use App\Http\Controllers\LoginiController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create')->middleware('auth');
    Route::post('/create', [ProductController::class, 'save'])->name('save');

    Route::get('/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [ProductController::class, 'update'])->name('update');

    // Route::get('/{id}', [ProductController::class, 'destroy'])->name('destroy')->middleware('auth');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
});

Route::prefix('musics')->name('musics.')->group(function () {
    Route::get('/', [MusicController::class, 'index'])->name('index');
    Route::get('/create', [MusicController::class, 'create'])->name('create');
    Route::post('/create', [MusicController::class, 'save'])->name('save');

    Route::get('/{id}', [MusicController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [MusicController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [MusicController::class, 'update'])->name('update');

    // Route::get('/{id}', [ProductController::class, 'destroy'])->name('destroy')->middleware('auth');
    Route::delete('/{id}', [MusicController::class, 'destroy'])->name('destroy');
});



Route::prefix('productsx')->name('productsx.')->group(function () {
    Route::get('/', [ProductxController::class, 'index'])->name('index');
});


Route::prefix('productsi')->name('productsi.')->group(function () {
    Route::get('/', [ProductiController::class, 'index'])->name('index');
    Route::get('/create', [ProductiController::class, 'create'])->name('create');
    Route::post('/create', [ProductiController::class, 'save'])->name('save');

    Route::get('/{id}', [ProductiController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProductiController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [ProductiController::class, 'update'])->name('update');

    // Route::get('/{id}', [ProductController::class, 'destroy'])->name('destroy')->middleware('auth');
    Route::delete('/{id}', [ProductConitroller::class, 'destroy'])->name('destroy');
});

Route::get('/logini', [LoginiController::class, 'index'])->name('logini');
require __DIR__ . '/auth.php';
