<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Setting\UserController;
use App\Http\Controllers\Front_End\Blog\BlogController;
use App\Http\Controllers\Front_End\Help\FaqController;
use App\Http\Controllers\Front_End\Home\HomeController;
use App\Http\Controllers\Front_End\Packet\DedicatedController;
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
    Route::get('/dedicated', [DedicatedController::class, 'index'])->name('packet.dedicated');
});
Route::prefix('bantuan')->group(function () {
    Route::get('/tutorial', [RitelController::class, 'index'])->name('help.tips');
    Route::get('/faq', [FaqController::class, 'index'])->name('help.faq');
});


//backend routes

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('setting')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('backend.users');
            Route::get('/getData', [UserController::class, 'getData'])->name('backend.users.getData');
        });
    });
});
