<?php

use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\Auth\ProfileController;
use App\Http\Controllers\Backend\Coverage\AreaController;
use App\Http\Controllers\Backend\Coverage\MapsController;
use App\Http\Controllers\Backend\Coverage\OdpController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Packet\CategoriController;
use App\Http\Controllers\Backend\Packet\Description_packet;
use App\Http\Controllers\Backend\Packet\PacketController;
use App\Http\Controllers\Backend\Promo\PromoControllerBackend;
use App\Http\Controllers\Backend\Setting\UserController;
use App\Http\Controllers\Front_End\Blog\BlogController;
use App\Http\Controllers\Front_End\COntact\ContactController;
use App\Http\Controllers\Front_End\Coverage\CoverageController;
use App\Http\Controllers\Front_End\Help\FaqController;
use App\Http\Controllers\Front_End\Home\HomeController;
use App\Http\Controllers\Front_End\Packet\DedicatedController;
use App\Http\Controllers\Front_End\Packet\InternettvController;
use App\Http\Controllers\Front_End\Packet\RitelController;
use App\Http\Controllers\Front_End\Promo\PromoContoller;
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
    Route::get('/promo', [PromoContoller::class, 'index'])->name('packet.promo');
});
Route::prefix('bantuan')->group(function () {
    Route::get('/tutorial', [RitelController::class, 'index'])->name('help.tips');
    Route::get('/faq', [FaqController::class, 'index'])->name('help.faq');
});


Route::get('/coverage', [CoverageController::class, 'index'])->name('coverage');


Route::get('/hubungi-kami', [ContactController::class, 'index'])->name('contact');


//backend routes
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login')->middleware('guest');
    Route::post('/store', [AuthController::class, 'signin'])->name('auth.signin');
    Route::get('/logout', [AuthController::class, 'signout'])->name('auth.logout');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //route profile
    Route::prefix('profile')->group(function () {
        Route::get('/edit/{id}', [ProfileController::class, 'index'])->name('backend.profile.edit');
        Route::put('/update/{id}', [ProfileController::class, 'update'])->name('backend.profile.update');
    });

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
            Route::get('getData', [Description_packet::class, 'getData'])->name('backend.deskription.getData');
            Route::get('tambah', [Description_packet::class, 'create'])->name('backend.add.deskription');
            Route::post('store', [Description_packet::class, 'store'])->name('backend.deskription.store');
            Route::get('edit/{id}', [Description_packet::class, 'edit'])->name('backend.deskription.edit');
            Route::put('update/{id}', [Description_packet::class, 'update'])->name('backend.deskription.update');
            Route::delete('delete/{id}', [Description_packet::class, 'destroy'])->name('backend.deskription.delete');
        });
    });

    //page promo

    Route::prefix('promo')->group(function () {
        Route::get('', [PromoControllerBackend::class, 'index'])->name('backend.promo');
        Route::get('/getData', [PromoControllerBackend::class, 'getData'])->name('backend.promo.getData');
        Route::get('tambah', [PromoControllerBackend::class, 'create'])->name('backend.add.promo');
        Route::post('store', [PromoControllerBackend::class, 'store'])->name('backend.promo.store');
        Route::get('/edit/{id}', [PromoControllerBackend::class, 'show'])->name('backend.promo.edit');
        Route::put('/update/{id}', [PromoControllerBackend::class, 'update'])->name('backend.promo.update');
        Route::delete('/delete/{id}', [PromoControllerBackend::class, 'destroy'])->name('backend.promo.delete');
    });


    Route::prefix('coverage')->group(function () {
        Route::prefix('area')->group(function () {
            Route::get('', [AreaController::class, 'index'])->name('backend.area');
            Route::get('/getData', [AreaController::class, 'getData'])->name('backend.area.getData');
            Route::get('tambah', [AreaController::class, 'create'])->name('backend.add.area');
            Route::post('store', [AreaController::class, 'store'])->name('backend.area.store');
            Route::get('/edit/{id}', [AreaController::class, 'show'])->name('backend.area.edit');
            Route::put('/update/{id}', [AreaController::class, 'update'])->name('backend.area.update');
            Route::delete('/delete/{id}', [AreaController::class, 'destroy'])->name('backend.area.delete');
        });

        Route::prefix('odp')->group(function () {
            Route::get('', [OdpController::class, 'index'])->name('backend.odp');
            Route::get('/getData', [OdpController::class, 'getData'])->name('backend.odp.getData');
            Route::get('tambah', [OdpController::class, 'create'])->name('backend.add.odp');
            Route::post('store', [OdpController::class, 'store'])->name('backend.odp.store');
            Route::get('/edit/{id}', [OdpController::class, 'edit'])->name('backend.odp.edit');
            Route::put('/update/{id}', [OdpController::class, 'update'])->name('backend.odp.update');
            Route::delete('/delete/{id}', [OdpController::class, 'destroy'])->name('backend.odp.delete');
        });
        Route::prefix('maps')->group(function () {
            Route::get('', [MapsController::class, 'index'])->name('backend.maps');
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
