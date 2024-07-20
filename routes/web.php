<?php

use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Packet\CategoriController;
use App\Http\Controllers\Backend\Packet\Description_packet;
use App\Http\Controllers\Backend\Packet\PacketController;
use App\Http\Controllers\Backend\Setting\UserController;
use App\Http\Controllers\Front_End\Blog\BlogController;
use App\Http\Controllers\Front_End\COntact\ContactController;
use App\Http\Controllers\Front_End\Help\FaqController;
use App\Http\Controllers\Front_End\Home\HomeController;
use App\Http\Controllers\Front_End\Packet\DedicatedController;
use App\Http\Controllers\Front_End\Packet\InternettvController;
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
    Route::get('/internet-tv', [InternettvController::class, 'index'])->name('packet.internettv');
});
Route::prefix('bantuan')->group(function () {
    Route::get('/tutorial', [RitelController::class, 'index'])->name('help.tips');
    Route::get('/faq', [FaqController::class, 'index'])->name('help.faq');
});


Route::get('/hubungi-kami', [ContactController::class, 'index'])->name('contact');


//backend routes
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login')->middleware('guest');
    Route::post('/store', [AuthController::class, 'signin'])->name('auth.signin')->middleware('guest');
});
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // page packet
    Route::prefix('packet')->group(function () {

        Route::prefix('')->group(function () {
            Route::get('', [PacketController::class, 'index'])->name('backend.packet');
            Route::get('/getData', [PacketController::class, 'getData'])->name('backend.packet.getData');
            Route::get('tambah', [PacketController::class, 'create'])->name('backend.add.packet');
            Route::post('store', [PacketController::class, 'store'])->name('backend.packet.store');
            Route::get('/edit/{id}', [PacketController::class, 'show'])->name('backend.packet.edit');
            Route::put('/update/{id}', [PacketController::class, 'update'])->name('backend.packet.update');
            Route::delete('/delete/{id}', [PacketController::class, 'destroy'])->name('backend.packet.delete');
        });

        Route::prefix('categori')->group(function () {
            Route::get('', [CategoriController::class, 'index'])->name('backend.categoripacket');
            Route::get('/getData', [CategoriController::class, 'getData'])->name('backend.categoripacket.getData');
            Route::get('tambah', [CategoriController::class, 'create'])->name('backend.add.categoripacket');
            Route::post('store', [CategoriController::class, 'store'])->name('backend.categoripacket.store');
            Route::get('/edit/{id}', [CategoriController::class, 'show'])->name('backend.categoripacket.edit');
            Route::put('/update/{id}', [CategoriController::class, 'update'])->name('backend.categoripacket.update');
            Route::delete('/delete/{id}', [CategoriController::class, 'destroy'])->name('backend.categoripacket.delete');
        });
        //deskripsi paket
        Route::prefix('deskripsi')->group(function () {
            Route::get('', [Description_packet::class, 'index'])->name('backend.deskription');
            Route::get('getData/{id}', [Description_packet::class, 'getData'])->name('backend.deskription.getData');
            Route::get('tambah', [Description_packet::class, 'create'])->name('backend.add.deskription');
            Route::post('store', [Description_packet::class, 'store'])->name('backend.deskription.store');
            Route::get('edit/{id}', [Description_packet::class, 'show'])->name('backend.deskription.edit');
            Route::put('update/{id}', [Description_packet::class, 'update'])->name('backend.deskription.update');
            Route::delete('delete/{id}', [Description_packet::class, 'destroy'])->name('backend.deskription.delete');
        });
    });


    // page setting
    Route::prefix('setting')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('backend.users');
            Route::get('/getData', [UserController::class, 'getData'])->name('backend.users.getData');
        });
    });
});
