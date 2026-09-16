<?php

use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\Auth\ProfileController;
use App\Http\Controllers\Backend\Career\HiringJobController;
use App\Http\Controllers\Backend\Career\LocationJobController;
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
use App\Http\Controllers\Backend\Setting\PermissionController;
use App\Http\Controllers\Backend\Setting\RoleController;
use App\Http\Controllers\Backend\Setting\UserController;
use App\Http\Controllers\Backend\TremofServiceBackend\TremofServiceBackendController;
use App\Http\Controllers\Front_End\Blog\BlogController;
use App\Http\Controllers\Front_End\Career\CareerController;
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
use App\Http\Controllers\Backend\Career\CategoryJobController;
use App\Http\Controllers\Backend\PDF\PDFController;
use App\Http\Controllers\Front_End\PreRegister\PreRegisterController;
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
Route::get('/view/file/{filename}', [MediaController::class, 'showFile'])->middleware('auth');

Route::get('/preregister', [PreRegisterController::class, 'index'])->name('preregister');

Route::get('/hubungi-kami', [ContactController::class, 'index'])->name('contact');
Route::get('/syarat-dan-ketentuan', [TremOfServiceController::class, 'index'])->name('tremofservice');
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');

//career
Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::get('/career/{slug}', [CareerController::class, 'detail'])->name('career.detail');


//backend routes
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login')->middleware('guest');
    Route::post('/store', [AuthController::class, 'signin'])->name('auth.signin');
    Route::get('/logout', [AuthController::class, 'signout'])->name('auth.logout');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->can('read-dashboard');


    //route partner
    Route::prefix('partner')->group(function () {
        Route::get('', [PartnerController::class, 'index'])->name('backend.partner')->can('read-partner');
        Route::get('/getData', [PartnerController::class, 'getData'])->name('backend.partner.getData');
        Route::get('tambah', [PartnerController::class, 'create'])->name('backend.add.partner')->can('create-partner');
        Route::post('store', [PartnerController::class, 'store'])->name('backend.partner.store');
        Route::get('/edit/{id}', [PartnerController::class, 'show'])->name('backend.partner.edit')->can('update-partner');
        Route::put('/update/{id}', [PartnerController::class, 'update'])->name('backend.partner.update');
        Route::delete('/delete/{id}', [PartnerController::class, 'destroy'])->name('backend.partner.delete')->can('delete-partner');
    });

    //route media
    Route::prefix('media')->group(function () {
        Route::get('', [MediaController::class, 'index'])->name('backend.media')->can('read-media');
        Route::get('/getData', [MediaController::class, 'getData'])->name('backend.media.getData');
        Route::get('tambah', [MediaController::class, 'create'])->name('backend.add.media')->can('create-media');
        Route::post('store', [MediaController::class, 'store'])->name('backend.media.store');
        Route::get('/edit/{id}', [MediaController::class, 'show'])->name('backend.media.edit')->can('update-media');
        Route::put('/update/{id}', [MediaController::class, 'update'])->name('backend.media.update');
        Route::delete('/delete/{id}', [MediaController::class, 'destroy'])->name('backend.media.delete')->can('delete-media');
        Route::get('detail/{slug}', [MediaController::class, 'detail'])->name('backend.media.detail')->can('read-media');
    });

    //route instalation letter
    Route::prefix('spk')->group(function () {
        Route::get('', [PDFController::class, 'index'])->name('backend.spk')->can('read-spk');
        Route::get('/getData', [PDFController::class, 'getData'])->name('backend.spk.getData');
        Route::get('create', [PDFController::class, 'create'])->name('backend.spk.add')->can('create-spk');
        Route::post('store', [PDFController::class, 'store'])->name('backend.spk.store');
        Route::get('/edit/{id}', [PDFController::class, 'show'])->name('backend.spk.edit')->can('update-spk');
        Route::put('/update/{id}', [PDFController::class, 'update'])->name('backend.spk.update');
        Route::delete('/delete/{id}', [PDFController::class, 'destroy'])->name('backend.spk.delete')->can('delete-spk');
    });

    //route faq
    Route::prefix('faq')->group(function () {
        Route::get('', [FaqFaqController::class, 'index'])->name('backend.faq')->can('read-faq');
        Route::get('/getData', [FaqFaqController::class, 'getData'])->name('backend.faq.getData');
        Route::get('tambah', [FaqFaqController::class, 'create'])->name('backend.add.faq')->can('create-faq');
        Route::post('store', [FaqFaqController::class, 'store'])->name('backend.faq.store');
        Route::get('/edit/{id}', [FaqFaqController::class, 'show'])->name('backend.faq.edit')->can('update-faq');
        Route::put('/update/{id}', [FaqFaqController::class, 'update'])->name('backend.faq.update');
        Route::delete('/delete/{id}', [FaqFaqController::class, 'destroy'])->name('backend.faq.delete')->can('delete-faq');
    });

    //route tremofservice
    Route::prefix('tremofservice')->group(function () {
        Route::get('', [TremofServiceBackendController::class, 'index'])->name('backend.tremofservice')->can('read-tremofservice');
        Route::get('/getData', [TremofServiceBackendController::class, 'getData'])->name('backend.tremofservice.getData');
        Route::get('/edit/{id}', [TremofServiceBackendController::class, 'show'])->name('backend.tremofservice.edit')->can('update-tremofservice');
        Route::put('/update/{id}', [TremofServiceBackendController::class, 'update'])->name('backend.tremofservice.update');
        Route::delete('/delete/{id}', [TremofServiceBackendController::class, 'destroy'])->name('backend.tremofservice.delete')->can('delete-tremofservice');
    });

    //route privacy policy
    Route::prefix('privacy-policy')->group(function () {
        Route::get('', [PrivacyControllerBackend::class, 'index'])->name('backend.privacypolicy')->can('read-privacyppolicy');
        Route::get('/getData', [PrivacyControllerBackend::class, 'getData'])->name('backend.privacypolicy.getData');
        Route::get('/edit/{id}', [PrivacyControllerBackend::class, 'show'])->name('backend.privacypolicy.edit')->can('update-privacyppolicy');
        Route::put('/update/{id}', [PrivacyControllerBackend::class, 'update'])->name('backend.privacypolicy.update');
        Route::delete('/delete/{id}', [PrivacyControllerBackend::class, 'destroy'])->name('backend.privacypolicy.delete')->can('delete-privacyppolicy');
    });

    //route profile
    Route::prefix('profile')->group(function () {
        Route::get('/edit/{id}', [ProfileController::class, 'index'])->name('backend.profile.edit');
        Route::put('/update/{id}', [ProfileController::class, 'update'])->name('backend.profile.update');
    });

    // page packet
    Route::prefix('packet')->group(function () {
        Route::prefix('')->group(function () {
            Route::get('', [PacketController::class, 'index'])->name('backend.packet')->can('read-paket');
            Route::get('/getData', [PacketController::class, 'getData'])->name('backend.packet.getData');
            Route::get('tambah', [PacketController::class, 'create'])->name('backend.add.packet')->can('create-paket');
            Route::post('store', [PacketController::class, 'store'])->name('backend.packet.store');
            Route::get('/edit/{id}', [PacketController::class, 'show'])->name('backend.packet.edit')->can('update-paket');
            Route::put('/update/{id}', [PacketController::class, 'update'])->name('backend.packet.update');
            Route::delete('/delete/{id}', [PacketController::class, 'destroy'])->name('backend.packet.delete')->can('delete-paket');
        });

        Route::prefix('categori')->group(function () {
            Route::get('', [CategoriController::class, 'index'])->name('backend.categoripacket')->can('read-categoripaket');
            Route::get('/getData', [CategoriController::class, 'getData'])->name('backend.categoripacket.getData');
            Route::get('tambah', [CategoriController::class, 'create'])->name('backend.add.categoripacket')->can('create-categoripaket');
            Route::post('store', [CategoriController::class, 'store'])->name('backend.categoripacket.store');
            Route::get('/edit/{id}', [CategoriController::class, 'show'])->name('backend.categoripacket.edit')->can('delete-categoripaket');
            Route::put('/update/{id}', [CategoriController::class, 'update'])->name('backend.categoripacket.update');
            Route::delete('/delete/{id}', [CategoriController::class, 'destroy'])->name('backend.categoripacket.delete')->can('delete-categoripaket');
        });
        //deskripsi paket
        Route::prefix('deskripsi')->group(function () {
            Route::get('', [Description_packet::class, 'index'])->name('backend.deskription')->can('read-deskripsi');
            Route::get('getData', [Description_packet::class, 'getData'])->name('backend.deskription.getData');
            Route::get('tambah', [Description_packet::class, 'create'])->name('backend.add.deskription')->can('create-deskripsi');
            Route::post('store', [Description_packet::class, 'store'])->name('backend.deskription.store');
            Route::get('edit/{id}', [Description_packet::class, 'edit'])->name('backend.deskription.edit')->can('update-deskripsi');
            Route::put('update/{id}', [Description_packet::class, 'update'])->name('backend.deskription.update');
            Route::delete('delete/{id}', [Description_packet::class, 'destroy'])->name('backend.deskription.delete')->can('delete-deskripsi');
        });
    });
    // page career
    Route::prefix('career')->group(function () {
        Route::prefix('kategori')->group(function () {
            Route::get('', [CategoryJobController::class, 'index'])->name('backend.categoryjob')->can('read-categoryjob');
            Route::get('/getData', [CategoryJobController::class, 'getData'])->name('backend.categoryjob.getData');
            Route::get('tambah', [CategoryJobController::class, 'create'])->name('backend.add.categoryjob')->can('create-categoryjob');
            Route::post('store', [CategoryJobController::class, 'store'])->name('backend.categoryjob.store');
            Route::get('/edit/{id}', [CategoryJobController::class, 'show'])->name('backend.categoryjob.edit')->can('update-categoryjob');
            Route::put('/update/{id}', [CategoryJobController::class, 'update'])->name('backend.categoryjob.update');
            Route::delete('/delete/{id}', [CategoryJobController::class, 'destroy'])->name('backend.categoryjob.delete')->can('delete-categoryjob');
        });
        //career location
        Route::prefix('lokasi')->group(function () {
            Route::get('', [LocationJobController::class, 'index'])->name('backend.locationjob')->can('read-locationjob');
            Route::get('/getData', [LocationJobController::class, 'getData'])->name('backend.locationjob.getData');
            Route::get('tambah', [LocationJobController::class, 'create'])->name('backend.add.locationjob')->can('create-locationjob');
            Route::post('store', [LocationJobController::class, 'store'])->name('backend.locationjob.store');
            Route::get('/edit/{id}', [LocationJobController::class, 'show'])->name('backend.locationjob.edit')->can('delete-locationjob');
            Route::put('/update/{id}', [LocationJobController::class, 'update'])->name('backend.locationjob.update');
            Route::delete('/delete/{id}', [LocationJobController::class, 'destroy'])->name('backend.locationjob.delete')->can('delete-locationjob');
        });
        //career
        Route::prefix('')->group(function () {
            Route::get('', [HiringJobController::class, 'index'])->name('backend.hiring')->can('read-hiring');
            Route::get('getData', [HiringJobController::class, 'getData'])->name('backend.hiring.getData');
            Route::get('tambah', [HiringJobController::class, 'create'])->name('backend.add.hiring')->can('create-hiring');
            Route::post('store', [HiringJobController::class, 'store'])->name('backend.hiring.store');
            Route::get('edit/{id}', [HiringJobController::class, 'edit'])->name('backend.hiring.edit')->can('update-hiring');
            Route::put('update/{id}', [HiringJobController::class, 'update'])->name('backend.hiring.update');
            Route::delete('delete/{id}', [HiringJobController::class, 'destroy'])->name('backend.hiring.delete')->can('delete-hiring');
        });
    });

    //page promo
    Route::prefix('promo')->group(function () {
        Route::get('', [PromoControllerBackend::class, 'index'])->name('backend.promo')->can('read-promo');
        Route::get('/getData', [PromoControllerBackend::class, 'getData'])->name('backend.promo.getData');
        Route::get('tambah', [PromoControllerBackend::class, 'create'])->name('backend.add.promo')->can('create-promo');
        Route::post('store', [PromoControllerBackend::class, 'store'])->name('backend.promo.store');
        Route::get('/edit/{id}', [PromoControllerBackend::class, 'show'])->name('backend.promo.edit')->can('update-promo');
        Route::put('/update/{id}', [PromoControllerBackend::class, 'update'])->name('backend.promo.update');
        Route::delete('/delete/{id}', [PromoControllerBackend::class, 'destroy'])->name('backend.promo.delete')->can('delete-promo');

        //promo paket
        Route::prefix('paket')->group(function () {
            Route::get('', [PromoPacketController::class, 'index'])->name('backend.promo_paket')->can('read-promopaket');
            Route::get('/getData', [PromoPacketController::class, 'getData'])->name('backend.promo_paket.getData');
            Route::get('tambah', [PromoPacketController::class, 'create'])->name('backend.add.promo_paket')->can('create-promopaket');
            Route::post('store', [PromoPacketController::class, 'store'])->name('backend.promo_paket.store');
            Route::get('/edit/{id}', [PromoPacketController::class, 'show'])->name('backend.promo_paket.edit')->can('update-promopaket');
            Route::put('/update/{id}', [PromoPacketController::class, 'update'])->name('backend.promo_paket.update');
            Route::delete('/delete/{id}', [PromoPacketController::class, 'destroy'])->name('backend.promo_paket.delete')->can('delete-promopaket');
        });
    });

    Route::prefix('coverage-area')->group(function () {
        Route::prefix('kota')->group(function () {
            Route::get('', [KotaController::class, 'index'])->name('backend.kota')->can('read-kota');
            Route::get('/getData', [KotaController::class, 'getData'])->name('backend.kota.getData');
            Route::get('tambah', [KotaController::class, 'create'])->name('backend.add.kota')->can('create-kota');
            Route::post('store', [KotaController::class, 'store'])->name('backend.kota.store');
            Route::get('/edit/{id}', [KotaController::class, 'show'])->name('backend.kota.edit')->can('update-kota');
            Route::put('/update/{id}', [KotaController::class, 'update'])->name('backend.kota.update');
            Route::delete('/delete/{id}', [KotaController::class, 'destroy'])->name('backend.kota.delete')->can('delete-kota');
        });
        Route::prefix('kecamatan')->group(function () {
            Route::get('', [KecamatanController::class, 'index'])->name('backend.kecamatan')->can('read-kecamatan');
            Route::get('/getData', [KecamatanController::class, 'getData'])->name('backend.kecamatan.getData');
            Route::get('tambah', [KecamatanController::class, 'create'])->name('backend.add.kecamatan')->can('create-kecamatan');
            Route::post('store', [KecamatanController::class, 'store'])->name('backend.kecamatan.store');
            Route::get('/edit/{id}', [KecamatanController::class, 'show'])->name('backend.kecamatan.edit')->can('update-kecamatan');
            Route::put('/update/{id}', [KecamatanController::class, 'update'])->name('backend.kecamatan.update');
            Route::delete('/delete/{id}', [KecamatanController::class, 'destroy'])->name('backend.kecamatan.delete')->can('delete-kecamatan');
        });
        Route::prefix('kelurahan')->group(function () {
            Route::get('', [KelurahanController::class, 'index'])->name('backend.kelurahan')->can('read-kelurahan');
            Route::get('/getData', [KelurahanController::class, 'getData'])->name('backend.kelurahan.getData');
            Route::get('tambah', [KelurahanController::class, 'create'])->name('backend.add.kelurahan')->can('create-kelurahan');
            Route::post('store', [KelurahanController::class, 'store'])->name('backend.kelurahan.store');
            Route::get('/edit/{id}', [KelurahanController::class, 'show'])->name('backend.kelurahan.edit')->can('update-kelurahan');
            Route::put('/update/{id}', [KelurahanController::class, 'update'])->name('backend.kelurahan.update');
            Route::delete('/delete/{id}', [KelurahanController::class, 'destroy'])->name('backend.kelurahan.delete')->can('delete-kelurahan');
        });
        Route::prefix('jalan')->group(function () {
            Route::get('', [JalanController::class, 'index'])->name('backend.jalan')->can('read-jalan');
            Route::get('/getData', [JalanController::class, 'getData'])->name('backend.jalan.getData');
            Route::get('tambah', [JalanController::class, 'create'])->name('backend.add.jalan')->can('create-jalan');
            Route::post('store', [JalanController::class, 'store'])->name('backend.jalan.store');
            Route::get('/edit/{id}', [JalanController::class, 'show'])->name('backend.jalan.edit')->can('update-jalan');
            Route::put('/update/{id}', [JalanController::class, 'update'])->name('backend.jalan.update');
            Route::delete('/delete/{id}', [JalanController::class, 'destroy'])->name('backend.jalan.delete')->can('delete-jalan');
        });
    });

    Route::prefix('coverage')->group(function () {
        Route::prefix('area')->group(function () {
            Route::get('', [AreaController::class, 'index'])->name('backend.area')->can('read-area');
            Route::get('/getData', [AreaController::class, 'getData'])->name('backend.area.getData');
            Route::get('tambah', [AreaController::class, 'create'])->name('backend.add.area')->can('create-area');
            Route::post('store', [AreaController::class, 'store'])->name('backend.area.store');
            Route::get('/edit/{id}', [AreaController::class, 'show'])->name('backend.area.edit')->can('update-area');
            Route::put('/update/{id}', [AreaController::class, 'update'])->name('backend.area.update');
            Route::delete('/delete/{id}', [AreaController::class, 'destroy'])->name('backend.area.delete')->can('delete-area');
        });

        Route::prefix('odp')->group(function () {
            Route::get('', [OdpController::class, 'index'])->name('backend.odp')->can('read-odp');
            Route::get('/getData', [OdpController::class, 'getData'])->name('backend.odp.getData');
            Route::get('tambah', [OdpController::class, 'create'])->name('backend.add.odp')->can('create-odp');
            Route::post('store', [OdpController::class, 'store'])->name('backend.odp.store');
            Route::get('/edit/{id}', [OdpController::class, 'edit'])->name('backend.odp.edit')->can('update-odp');
            Route::put('/update/{id}', [OdpController::class, 'update'])->name('backend.odp.update');
            Route::delete('/delete/{id}', [OdpController::class, 'destroy'])->name('backend.odp.delete')->can('delete-odp');
        });
        Route::prefix('maps')->group(function () {
            Route::get('', [MapsController::class, 'index'])->name('backend.maps')->can('read-maps');
        });
    });

    // page setting
    Route::prefix('setting')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('backend.users')->can('read-users');
            Route::get('/getData', [UserController::class, 'getData'])->name('backend.users.getData');
            Route::get('tambah', [UserController::class, 'create'])->name('backend.add.users')->can('create-users');
            Route::post('store', [UserController::class, 'store'])->name('backend.users.store');
            Route::get('/edit/{id}', [UserController::class, 'show'])->name('backend.users.edit')->can('update-users');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('backend.users.update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('backend.users.delete')->can('delte-users');
        });

        Route::prefix('role')->group(function () {
            Route::get('', [RoleController::class, 'index'])->name('backend.role')->can('read-role');
            Route::get('/getData', [RoleController::class, 'getData'])->name('backend.role.getData');
            Route::get('tambah', [RoleController::class, 'create'])->name('backend.add.role')->can('read-role');
            Route::post('store', [RoleController::class, 'store'])->name('backend.role.store');
            Route::get('/edit/{id}', [RoleController::class, 'show'])->name('backend.role.edit')->can('read-role');
            Route::put('/update/{id}', [RoleController::class, 'update'])->name('backend.role.update');
            Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('backend.role.delete')->can('read-role');
        });
    });
});
