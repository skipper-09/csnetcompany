<?php

use App\Http\Controllers\Front_End\Blog\BlogController;
use App\Http\Controllers\Front_End\Home\HomeController;
use App\Http\Controllers\Front_End\Packet\RitelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

//front end

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::prefix('packet')->group(function () {
    Route::get('/broadband', [RitelController::class, 'index'])->name('packet.ritel');
    
});