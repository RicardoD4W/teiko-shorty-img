<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect('/login'));

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/upload', [ImageController::class, 'showUploadForm'])->name('upload.form');
    Route::post('/upload', [ImageController::class, 'store'])->name('upload.store');
    Route::get('/gallery', [ImageController::class, 'gallery'])->name('gallery');
    Route::delete('/image/{slug}', [ImageController::class, 'destroy'])->name('image.destroy');
});

Route::get('/i/{slug}', [ImageController::class, 'show'])->name('image.show');
