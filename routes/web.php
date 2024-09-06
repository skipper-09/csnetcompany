<?php

use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\Auth\ProfileController;
use App\Http\Controllers\Backend\CekCoverage\Jalan\JalanController;
use App\Http\Controllers\Backend\CekCoverage\Kecamatan\KecamatanController;
use App\Http\Controllers\Backend\CekCoverage\Kelurahan\KelurahanController;
use App\Http\Controllers\Backend\CekCoverage\Kota\KotaController;
use App\Http\Controllers\Backend\Coverage\AreaController;
use App\Http\Controllers\Backend\Coverage\MapsController;
use App\Http\Controllers\Backend\Coverage\OdpController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Faq\FaqController as FaqFaqController;
use App\Http\Controllers\Backend\Media\MediaController;
use App\Http\Controllers\Backend\Packet\CategoriController;
use App\Http\Controllers\Backend\Packet\Description_packet;
use App\Http\Controllers\Backend\Packet\PacketController;
use App\Http\Controllers\Backend\Partner\PartnerController;
use App\Http\Controllers\Backend\Privacy\PrivacyControllerBackend;
use App\Http\Controllers\Backend\Promo\PromoControllerBackend;
use App\Http\Controllers\Backend\Promo\PromoPacketController;
use App\Http\Controllers\Backend\Setting\UserController;
use App\Http\Controllers\Backend\TremofServiceBackend\TremofServiceBackendController;
use App\Http\Controllers\Front_End\Blog\BlogController;
use App\Http\Controllers\Front_End\Cekarea\CekareaController;
use App\Http\Controllers\Front_End\COntact\ContactController;
use App\Http\Controllers\Front_End\Coverage\CoverageController;
use App\Http\Controllers\Front_End\Help\FaqController;
use App\Http\Controllers\Front_End\Home\HomeController;
use App\Http\Controllers\Front_End\Packet\DedicatedController;
use App\Http\Controllers\Front_End\Packet\InternettvController;
use App\Http\Controllers\Front_End\Packet\RitelController;
use App\Http\Controllers\Front_End\Privacy\PrivacyController;
use App\Http\Controllers\Front_End\Promo\PromoContoller;
use App\Http\Controllers\Front_End\TremOfService\TremOfServiceController;
use App\Models\PrivacyPolicy;
use App\Models\TremofService;
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
    Route::get('/promo/{slug}', [PromoContoller::class, 'detailpromo'])->name('packet.promo.detail');
});
Route::prefix('bantuan')->group(function () {
    Route::get('/tutorial', [RitelController::class, 'index'])->name('help.tips');
    Route::get('/faq', [FaqController::class, 'index'])->name('help.faq');
});


Route::get('/coverage', [CoverageController::class, 'index'])->name('coverage');
Route::get('/cek-area', [CekareaController::class, 'index'])->name('cekarea');
Route::get('/get-kecamatan/{kota_id}', [CekareaController::class, 'getKecamatan']);
Route::get('/get-kelurahan/{kecamatan_id}', [CekareaController::class, 'getKelurahan']);
Route::get('/get-jalan/{kelurahan_id}', [CekareaController::class, 'getJalan']);


Route::get('/hubungi-kami', [ContactController::class, 'index'])->name('contact');
Route::get('/syarat-dan-ketentuan', [TremOfServiceController::class, 'index'])->name('tremofservice');
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');


//backend routes
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login')->middleware('guest');
    Route::post('/store', [AuthController::class, 'signin'])->name('auth.signin');
    Route::get('/logout', [AuthController::class, 'signout'])->name('auth.logout');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    //route partner
    Route::prefix('partner')->group(function () {
        Route::get('', [PartnerController::class, 'index'])->name('backend.partner');
        Route::get('/getData', [PartnerController::class, 'getData'])->name('backend.partner.getData');
        Route::get('tambah', [PartnerController::class, 'create'])->name('backend.add.partner');
        Route::post('store', [PartnerController::class, 'store'])->name('backend.partner.store');
        Route::get('/edit/{id}', [PartnerController::class, 'show'])->name('backend.partner.edit');
        Route::put('/update/{id}', [PartnerController::class, 'update'])->name('backend.partner.update');
        Route::delete('/delete/{id}', [PartnerController::class, 'destroy'])->name('backend.partner.delete');
    });
    //route media
    Route::prefix('media')->group(function () {
        Route::get('', [MediaController::class, 'index'])->name('backend.media');
        Route::get('/getData', [MediaController::class, 'getData'])->name('backend.media.getData');
        Route::get('tambah', [MediaController::class, 'create'])->name('backend.add.media');
        Route::post('store', [MediaController::class, 'store'])->name('backend.media.store');
        Route::get('/edit/{id}', [MediaController::class, 'show'])->name('backend.media.edit');
        Route::put('/update/{id}', [MediaController::class, 'update'])->name('backend.media.update');
        Route::delete('/delete/{id}', [MediaController::class, 'destroy'])->name('backend.media.delete');
        Route::get('detail/{slug}', [MediaController::class, 'detail'])->name('backend.media.detail');
    });



    //route faq
    Route::prefix('faq')->group(function () {
        Route::get('', [FaqFaqController::class, 'index'])->name('backend.faq');
        Route::get('/getData', [FaqFaqController::class, 'getData'])->name('backend.faq.getData');
        Route::get('tambah', [FaqFaqController::class, 'create'])->name('backend.add.faq');
        Route::post('store', [FaqFaqController::class, 'store'])->name('backend.faq.store');
        Route::get('/edit/{id}', [FaqFaqController::class, 'show'])->name('backend.faq.edit');
        Route::put('/update/{id}', [FaqFaqController::class, 'update'])->name('backend.faq.update');
        Route::delete('/delete/{id}', [FaqFaqController::class, 'destroy'])->name('backend.faq.delete');
    });

    //route tremofservice
    Route::prefix('tremofservice')->group(function () {
        Route::get('', [TremofServiceBackendController::class, 'index'])->name('backend.tremofservice');
        Route::get('/getData', [TremofServiceBackendController::class, 'getData'])->name('backend.tremofservice.getData');
        Route::get('/edit/{id}', [TremofServiceBackendController::class, 'show'])->name('backend.tremofservice.edit');
        Route::put('/update/{id}', [TremofServiceBackendController::class, 'update'])->name('backend.tremofservice.update');
        Route::delete('/delete/{id}', [TremofServiceBackendController::class, 'destroy'])->name('backend.tremofservice.delete');
    });

    //route privacy policy
    Route::prefix('privacy-policy')->group(function () {
        Route::get('', [PrivacyControllerBackend::class, 'index'])->name('backend.privacypolicy');
        Route::get('/getData', [PrivacyControllerBackend::class, 'getData'])->name('backend.privacypolicy.getData');
        Route::get('/edit/{id}', [PrivacyControllerBackend::class, 'show'])->name('backend.privacypolicy.edit');
        Route::put('/update/{id}', [PrivacyControllerBackend::class, 'update'])->name('backend.privacypolicy.update');
        Route::delete('/delete/{id}', [PrivacyControllerBackend::class, 'destroy'])->name('backend.privacypolicy.delete');
    });


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

        //promo paket
        Route::prefix('paket')->group(function () {
            Route::get('', [PromoPacketController::class, 'index'])->name('backend.promo_paket');
            Route::get('/getData', [PromoPacketController::class, 'getData'])->name('backend.promo_paket.getData');
            Route::get('tambah', [PromoPacketController::class, 'create'])->name('backend.add.promo_paket');
            Route::post('store', [PromoPacketController::class, 'store'])->name('backend.promo_paket.store');
            Route::get('/edit/{id}', [PromoPacketController::class, 'show'])->name('backend.promo_paket.edit');
            Route::put('/update/{id}', [PromoPacketController::class, 'update'])->name('backend.promo_paket.update');
            Route::delete('/delete/{id}', [PromoPacketController::class, 'destroy'])->name('backend.promo_paket.delete');
        });
    });

    Route::prefix('coverage-area')->group(function () {
        Route::prefix('kota')->group(function () {
            Route::get('', [KotaController::class, 'index'])->name('backend.kota');
            Route::get('/getData', [KotaController::class, 'getData'])->name('backend.kota.getData');
            Route::get('tambah', [KotaController::class, 'create'])->name('backend.add.kota');
            Route::post('store', [KotaController::class, 'store'])->name('backend.kota.store');
            Route::get('/edit/{id}', [KotaController::class, 'show'])->name('backend.kota.edit');
            Route::put('/update/{id}', [KotaController::class, 'update'])->name('backend.kota.update');
            Route::delete('/delete/{id}', [KotaController::class, 'destroy'])->name('backend.kota.delete');
        });
        Route::prefix('kecamatan')->group(function () {
            Route::get('', [KecamatanController::class, 'index'])->name('backend.kecamatan');
            Route::get('/getData', [KecamatanController::class, 'getData'])->name('backend.kecamatan.getData');
            Route::get('tambah', [KecamatanController::class, 'create'])->name('backend.add.kecamatan');
            Route::post('store', [KecamatanController::class, 'store'])->name('backend.kecamatan.store');
            Route::get('/edit/{id}', [KecamatanController::class, 'show'])->name('backend.kecamatan.edit');
            Route::put('/update/{id}', [KecamatanController::class, 'update'])->name('backend.kecamatan.update');
            Route::delete('/delete/{id}', [KecamatanController::class, 'destroy'])->name('backend.kecamatan.delete');
        });
        Route::prefix('kelurahan')->group(function () {
            Route::get('', [KelurahanController::class, 'index'])->name('backend.kelurahan');
            Route::get('/getData', [KelurahanController::class, 'getData'])->name('backend.kelurahan.getData');
            Route::get('tambah', [KelurahanController::class, 'create'])->name('backend.add.kelurahan');
            Route::post('store', [KelurahanController::class, 'store'])->name('backend.kelurahan.store');
            Route::get('/edit/{id}', [KelurahanController::class, 'show'])->name('backend.kelurahan.edit');
            Route::put('/update/{id}', [KelurahanController::class, 'update'])->name('backend.kelurahan.update');
            Route::delete('/delete/{id}', [KelurahanController::class, 'destroy'])->name('backend.kelurahan.delete');
        });
        Route::prefix('jalan')->group(function () {
            Route::get('', [JalanController::class, 'index'])->name('backend.jalan');
            Route::get('/getData', [JalanController::class, 'getData'])->name('backend.jalan.getData');
            Route::get('tambah', [JalanController::class, 'create'])->name('backend.add.jalan');
            Route::post('store', [JalanController::class, 'store'])->name('backend.jalan.store');
            Route::get('/edit/{id}', [JalanController::class, 'show'])->name('backend.jalan.edit');
            Route::put('/update/{id}', [JalanController::class, 'update'])->name('backend.jalan.update');
            Route::delete('/delete/{id}', [JalanController::class, 'destroy'])->name('backend.jalan.delete');
        });
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
            Route::get('tambah', [UserController::class, 'create'])->name('backend.add.users');
            Route::post('store', [UserController::class, 'store'])->name('backend.users.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('backend.users.edit');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('backend.users.update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('backend.users.delete');
        });
    });
});
