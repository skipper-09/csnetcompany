@extends('front-end.layout.base')

@section('title', $page_name)
@push('css')
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/custom.css') }}">
    <style>
        #hero-2 {
            height: 100vh;
        }

        .bg--heading {
            background-position: center !important;
            background-repeat: no-repeat;
            background-size: cover !important;
        }


        /* .nav-tabs .nav-link {
                                                        background-color: #f8f9fa;
                                                        border: 1px solid #dee2e6;
                                                        color: #495057;
                                                        margin-right: 5px;
                                                        border-radius: 0.25rem 0.25rem 0 0;
                                                    }

                                                    .nav-tabs .nav-link.active {
                                                        background-color: #fff;
                                                        border-color: #dee2e6 #dee2e6 #fff;
                                                        color: #495057;
                                                    }

                                                    .nav-tabs .nav-link:hover {
                                                        border-color: #e9ecef #e9ecef #dee2e6;
                                                        color: #0056b3;
                                                    } */
    </style>
@endpush

@section('content')
    <!-- HERO-5============================================= -->
    <section id="hero-5" class="bg--scroll hero-section">
        <div class="container">
            <div class="row d-flex align-items-center">
                <!-- HERO TEXT -->
                <div class="col-md-6">
                    <div class="hero-5-txt wow fadeInRight">
                        <!-- Title -->
                        <h2 class="s-50 w-700">Konesi Internet Tanpa Batas</h2>
                        <!-- Text -->
                        <p class="p-lg">
                            Rasakan kecepatan internet super cepat untuk streaming, gaming, dan bekerja tanpa gangguan,
                            semuanya dengan harga yang sangat terjangkau.
                        </p>
                        <!-- Button -->
                        <a href="#banner-7" class="btn r-04 btn--theme hover--theme">Mulai Sekarang</a>
                    </div>
                </div> <!-- END HERO TEXT -->
                <!-- HERO IMAGE -->
                <div class="col-md-6">
                    <div class="hero-5-img wow fadeInLeft">
                        <img class="img-fluid" src="{{ asset('front-end/images/Group 832.png') }}" alt="hero-image">
                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
        <!-- WAVE SHAPE BOTTOM -->
        <div class="wave-shape-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 170">
                <path fill-opacity="1"
                    d="M0,160L120,160C240,160,480,160,720,138.7C960,117,1200,75,1320,53.3L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
                </path>
            </svg>
        </div>
    </section> <!-- END HERO-5 -->

    <section id="features-2" class="py-100 features-section division">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-80">
                        <!-- Title -->
                        <h2 class="s-50 w-700">
                            Keunggulan Paket Broadband
                        </h2>
                        <!-- Text -->
                        <p class="s-16 color--grey">
                            Paket broadband kami menawarkan keandalan tinggi, akses tanpa gangguan, serta harga yang sangat
                            bersaing.
                        </p>
                    </div>
                </div>
            </div>
            <div class="fbox-wrapper text-center">
                <div class="row row-cols-1 row-cols-md-3">
                    <!-- FEATURE BOX #1 - Kecepatan Internet Super Cepat -->
                    <div class="col">
                        <div class="fbox-2 fb-1 wow fadeInUp">
                            <!-- Image (SVG) -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <!-- SVG untuk Kecepatan (Petir) -->
                                <svg width="86px" height="86px" viewBox="-1.2 -1.2 26.40 26.40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.261 1.03462C12.6971 1.15253 13 1.54819 13 1.99997V8.99997H19C19.3581 8.99997 19.6888 9.19141 19.8671 9.50191C20.0455 9.8124 20.0442 10.1945 19.8638 10.5038L12.8638 22.5038C12.6361 22.8941 12.1751 23.0832 11.739 22.9653C11.3029 22.8474 11 22.4517 11 22V15H5C4.64193 15 4.3112 14.8085 4.13286 14.498C3.95452 14.1875 3.9558 13.8054 4.13622 13.4961L11.1362 1.4961C11.3639 1.10586 11.8249 0.916719 12.261 1.03462ZM6.74104 13H12C12.5523 13 13 13.4477 13 14V18.301L17.259 11H12C11.4477 11 11 10.5523 11 9.99997V5.69889L6.74104 13Z"
                                            fill="#0478BF"></path>
                                    </g>
                                </svg>
                            </div>
                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-18 w-700">Internet Super Cepat</h6>
                                <p>Nikmati internet cepat untuk streaming dan gaming tanpa gangguan.</p>
                            </div>
                        </div>
                    </div> <!-- END FEATURE BOX #1 -->

                    <!-- FEATURE BOX #2 - Koneksi Tanpa Batas -->
                    <div class="col">
                        <div class="fbox-2 fb-2 wow fadeInUp">
                            <!-- Image (SVG) -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <!-- SVG untuk Koneksi Tanpa Batas (Infinity Loop) -->
                                <svg fill="#fff" width="86px" height="86px" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" stroke="#0478BF">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M18,7a7.669,7.669,0,0,0-6,3.19A7.669,7.669,0,0,0,6,7C2.313,7,1,9.583,1,12c0,3.687,2.583,5,5,5a7.669,7.669,0,0,0,6-3.19A7.669,7.669,0,0,0,18,17c2.417,0,5-1.313,5-5C23,9.583,21.687,7,18,7ZM6,15a2.689,2.689,0,0,1-3-3A2.689,2.689,0,0,1,6,9c2.579,0,4.225,2.065,4.837,3C10.225,12.935,8.579,15,6,15Zm12,0c-2.579,0-4.225-2.065-4.837-3,.612-.935,2.258-3,4.837-3a2.689,2.689,0,0,1,3,3A2.689,2.689,0,0,1,18,15Z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-18 w-700">Koneksi Tanpa Batas</h6>
                                <p>Akses internet tanpa batas kuota untuk kebutuhan sehari-hari.</p>
                            </div>
                        </div>
                    </div> <!-- END FEATURE BOX #2 -->

                    <!-- FEATURE BOX #3 - Stabilitas dan Keandalan Koneksi -->
                    <div class="col">
                        <div class="fbox-2 fb-3 wow fadeInUp">
                            <!-- Image (SVG) -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <!-- SVG untuk Stabilitas Koneksi (Sinyal Stabil) -->
                                <svg width="86px" height="86px" viewBox="-1.6 -1.6 19.20 19.20"
                                    xmlns="http://www.w3.org/2000/svg" fill="#0478BF" stroke="#0478BF">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="m 8 1.992188 c -2.617188 0 -5.238281 0.933593 -7.195312 2.808593 l -0.496094 0.480469 c -0.3984378 0.378906 -0.410156 1.011719 -0.03125 1.410156 c 0.382812 0.398438 1.015625 0.410156 1.414062 0.03125 l 0.5 -0.476562 c 3.085938 -2.957032 8.53125 -2.957032 11.617188 0 l 0.5 0.476562 c 0.398437 0.378906 1.03125 0.367188 1.414062 -0.03125 c 0.378906 -0.398437 0.367188 -1.03125 -0.03125 -1.410156 l -0.496094 -0.484375 c -1.957031 -1.871094 -4.578124 -2.804687 -7.195312 -2.804687 z m -0.03125 4.007812 c -1.570312 0.011719 -3.128906 0.628906 -4.207031 1.8125 l -0.5 0.550781 c -0.179688 0.195313 -0.277344 0.453125 -0.261719 0.71875 c 0.011719 0.265625 0.128906 0.515625 0.328125 0.695313 c 0.195313 0.179687 0.453125 0.273437 0.71875 0.257812 c 0.265625 -0.011718 0.515625 -0.128906 0.695313 -0.328125 l 0.496093 -0.546875 c 1.277344 -1.402344 4.160157 -1.496094 5.523438 0.003906 l 0.5 0.542969 c 0.175781 0.199219 0.425781 0.316407 0.691406 0.328125 c 0.265625 0.015625 0.523437 -0.078125 0.722656 -0.257812 c 0.195313 -0.179688 0.3125 -0.429688 0.324219 -0.695313 c 0.011719 -0.261719 -0.082031 -0.523437 -0.261719 -0.71875 l -0.5 -0.546875 c -1.121093 -1.234375 -2.703125 -1.828125 -4.269531 -1.816406 z m 0.03125 4 c -0.511719 0 -1.023438 0.195312 -1.414062 0.585938 c -0.78125 0.78125 -0.78125 2.046874 0 2.828124 s 2.046874 0.78125 2.828124 0 s 0.78125 -2.046874 0 -2.828124 c -0.390624 -0.390626 -0.902343 -0.585938 -1.414062 -0.585938 z m 0 0"
                                            fill="#fff"></path>
                                    </g>
                                </svg>
                            </div>
                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-18 w-700">Stabilitas & Keandalan</h6>
                                <p>Koneksi stabil dan handal untuk segala aktivitas online.</p>
                            </div>
                        </div>
                    </div> <!-- END FEATURE BOX #3 -->
                </div> <!-- End row -->
            </div> <!-- END FEATURES-2 WRAPPER -->
        </div> <!-- End container -->
    </section>

    <!-- FEATURES-============================================= -->
    {{-- <section id="features-11" class="pt-100 features-section division">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">
                        <!-- Title -->
                        <h2 class="s-40 w-700">Keunggulan Paket Broadband</h2>
                        <!-- Text -->
                        <p class="s-21 color--grey">
                            Paket broadband kami menawarkan keandalan tinggi, akses tanpa gangguan, serta harga yang sangat bersaing.
                        </p>
                    </div>
                </div>
            </div>
            <!-- FEATURES-11 WRAPPER -->
            <div class="fbox-wrapper">
                <div class="row row-cols-1 row-cols-md-2 rows-3">


                    <!-- FEATURE BOX #1 -->
                    <div class="col">
                        <div class="fbox-11 fb-1 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-graphics"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">100% Fiber Oftic</h6>
                                <p>Kami menggunakan 100% fiber optic untuk memastikan Anda mendapatkan kecepatan internet
                                    yang tak tertandingi. Dengan teknologi ini, Anda dapat menikmati streaming, gaming, dan
                                    browsing tanpa hambatan.
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #1 -->


                    <!-- FEATURE BOX #2 -->
                    <div class="col">
                        <div class="fbox-11 fb-2 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-24-hours"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">24/7 Customer Service</h6>
                                <p>Kami berkomitmen untuk memberikan layanan pelanggan terbaik. Tim kami siap membantu Anda
                                    24/7 untuk memastikan pengalaman internet Anda selalu optimal.
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #2 -->


                    <!-- FEATURE BOX #3 -->
                    <div class="col">
                        <div class="fbox-11 fb-3 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-price-label"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">Harga Kompetitif</h6>
                                <p>Kami menawarkan paket internet dengan harga yang kompetitif tanpa mengorbankan kualitas.
                                    Dengan 100% fiber optic, Anda mendapatkan nilai terbaik untuk investasi Anda.
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #3 -->


                    <!-- FEATURE BOX #4 -->
                    <div class="col">
                        <div class="fbox-11 fb-4 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-iteration"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">Komitmen Terhadap Kepuasan Pelanggan</h6>
                                <p>Kepuasan Anda adalah prioritas kami. Dengan jaringan 100% fiber optic dan kestabilan
                                    jaringan, kami memastikan setiap pelanggan mendapatkan layanan yang memenuhi dan
                                    melebihi harapan.
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #4 -->


                    <!-- FEATURE BOX #5 -->
                    <div class="col">
                        <div class="fbox-11 fb-5 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-trophy"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">Stabil dan Handal</h6>
                                <p>Dengan 100% fiber optic, kami menjamin koneksi internet yang stabil dan andal. Tidak ada
                                    lagi masalah buffering atau gangguan koneksi di saat-saat penting.
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #5 -->


                    <!-- FEATURE BOX #6 -->
                    <div class="col">
                        <div class="fbox-11 fb-6 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico-wrap">
                                <div class="fbox-ico ico-50">
                                    <div class="shape-ico color--theme">

                                        <!-- Vector Icon -->
                                        <span class="flaticon-search-engine-1"></span>

                                        <!-- Shape -->
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                transform="translate(100 100)" />
                                        </svg>

                                    </div>
                                </div>
                            </div> <!-- End Icon -->

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">Tim Teknisi Handal</h6>
                                <p>Kami memiliki tim teknisi yang terlatih dan berpengalaman dalam menangani berbagai
                                    masalah teknis. Setiap teknisi kami adalah profesional yang berdedikasi untuk memberikan
                                    layanan terbaik.
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #6 -->


                </div> <!-- End row -->
            </div> <!-- END FEATURES-11 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END FEATURES-11 --> --}}

    <section id="pricing-1" class="gr--whitesmoke pb-40 inner-page-hero pricing-section">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="section-title mb-70">
                        <!-- Title -->
                        <h2 class="s-40 w-700">Tentukan Bandwidth Sesuai Kebutuhanmu</h2>
                        <!-- Text -->
                        <p class="p-xl">Sekarang saatnya menikmati kecepatan baru internet fiber ultra cepat dan
                            unlimited dari Idnet</p>
                    </div>
                </div>
            </div> <!-- END SECTION TITLE -->
            <!-- PRICING TABLES -->
            <div class="pricing-1-wrapper">
                <div class="row row-cols-1 row-cols-md-3">
                    <!-- STARTER PLAN -->
                    @foreach ($packet as $item)
                        <div class="col">
                            <div id="pt-1-1"
                                class="p-table pricing-1-table bg--white-100 block-shadow r-12 wow fadeInUp">
                                <!-- TABLE HEADER -->
                                <div class="pricing-table-header">
                                    <!-- Title -->
                                    <h5 class="s-28 w-700">{{ $item->speed }} Mbps</h5>
                                    <!-- Price -->
                                    <div class="price">
                                        <h5 class="s-20 color--black w-700">@currency($item->price) / {{ $item->duration }}</h5>
                                        <p class="color--grey">
                                            @if ($item->best_seller == true)
                                                <span class="best-seller">Best Seller</span>
                                            @endif
                                        </p>
                                    </div>
                                    <!-- Button -->
                                    <a href="https://forms.gle/JWxGAcGYQt2bmLf18"
                                        class="pt-btn btn r-04 btn--theme hover--theme">
                                        Berlangganan Sekarang
                                    </a>
                                </div> <!-- END TABLE HEADER -->
                                <!-- PRICING FEATURES -->
                                <ul class="pricing-features color--black ico-10 ico--green mt-25">
                                    <p class="s-18 w-500">
                                        Fitur-fitur
                                    </p>
                                    @foreach ($item->packetDescription as $des)
                                        <li>
                                            <img style="width: 24px; margin-right: 0.5rem"
                                                src="{{ url('storage/images/descrip/' . $des->logo) }}" alt="Description"
                                            >
                                            <span>{{ $des->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> <!-- END STARTER PLAN -->
                    @endforeach
                </div>
            </div> <!-- PRICING TABLES -->
        </div> <!-- End container -->
    </section>

    <!-- PRICING-1-->
    {{-- <section id="pricing-1" class="gr--whitesmoke pb-40 inner-page-hero pricing-section">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="section-title mb-70">
                        <!-- Title -->
                        <h2 class="s-40 w-700">Tentukan Bandwidth Sesuai Kebutuhanmu</h2>
                        <p class="p-xl">Sekarang saatnya menikmati kecepatan baru internet fiber ultra cepat dan
                            unlimited dari Idnet</p>
                    </div>
                </div>
            </div> <!-- END SECTION TITLE -->
            <!-- PRICING TABLES -->
            <div class="pricing ">
                <div class="owl-carousel ">
                    @foreach ($packet as $item)
                        <div class="card ">
                            <div class="align-self-center">
                                <div class="bg-pricing division">
                                    <div class="{{ $item->best_seller == true ? 'best-seller' : 'pricing-title' }}">
                                        <h5 class="text-center s-28 w-700 color--white">{{ $item->speed }}
                                            Mbps
                                        </h5>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5 class="text-center s-26 w-700 text-uppercase">{{ $item->name }}</h5>
                                    <div class="row mt-4">
                                        <div class="col-12 px-4">
                                            <p class="s-15 text-center">Fitur-fitur</p>
                                            <ul class="list-unstyled d-flex flex-column align-items-center justify-content-center">
                                                @foreach ($item->packetDescription as $des)
                                                    <li class="d-flex align-items-center justify-content-center gap-2" style="margin: 5px 0;">
                                                        <img style="width: 24px" src="{{ url('storage/images/descrip/' . $des->logo) }}" alt="">
                                                        <span class="s-15">{{ $des->name }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-12 text-center mb-4">
                                            <h4 style="color: #25316D" class="w-700">
                                                @currency($item->price)/{{ $item->duration }}</h4>
                                        </div>
                                        <div class=" text-center mb-4">
                                            <a href="https://forms.gle/JWxGAcGYQt2bmLf18">
                                                <button type="button" class="btn btn--theme btn-sm">Berlangganan
                                                    Sekarang</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div> <!-- PRICING TABLES -->


        </div> <!-- End container -->
    </section> <!-- END PRICING-1 --> --}}
    {{-- <!-- PRICING COMPARE -->                                                                                                                                     ============================================= -->
    <section id="comp-table" class="pt-100 pb-60 pricing-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">
                        <!-- Title -->
                        <h2 class="s-34 w-700">Rekomendasi Perangkat Untuk Kecepatan Internet Maksimal</h2>
                    </div>
                </div>
            </div>


            <!-- PRICING COMPARE -->
            <div class="comp-table wow fadeInUp">

                <div class="">
                    <!-- Table -->
                    <div class="table-responsive mb-50">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th style="width: 50%;">Kecepatan Internet</th>
                                    <th style="width: 50%;">Rekomendasi Jumlah Perangkat</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <th>10 Mbps</th>
                                    <td class="color--black">1-4 Perangkat</td>

                                </tr>

                                <tr>
                                    <th>15 Mbps</th>
                                    <td class="color--black">4-8 Perangkat</td>
                                </tr>
                                <tr>
                                    <th>20 Mbps</th>
                                    <td class="color--black">4-8 Perangkat</td>
                                </tr>
                                <tr>
                                    <th>25 Mbps</th>
                                    <td class="color--black">4-8 Perangkat</td>
                                </tr>
                                <tr>
                                    <th>50 Mbps</th>
                                    <td class="color--black">4-8 Perangkat</td>
                                </tr>

                            </tbody>

                        </table>
                    </div> <!-- End Table -->

                </div>

            </div> <!-- END PRICING COMPARE -->
        </div> <!-- End container -->
    </section> <!-- END PRICING COMPARE -->
 --}}

    <!-- FAQs-2                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ============================================= -->
    <section id="faqs-2" class="mt-100 pb-100 gr--whitesmoke inner-page-hero faqs-section division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">
                    <!-- INNER PAGE TITLE -->
                    <div class="inner-page-title">
                        <h2 class="s-46 w-700">Tanya Jawab</h2>
                        <p class="p-lg">Temukan jawaban untuk pertanyaan-pertanyaan yang sering diajukan oleh pelanggan
                            lainnya</p>
                    </div>
                    <!-- QUESTIONS ACCORDION -->
                    <div class="accordion-wrapper">
                        <ul class="accordion">
                            @foreach ($faq as $item)
                                <!-- QUESTIONS CATEGORY #1 -->
                                <li class="{{ $loop->first ? 'accordion-item is-active' : 'accordion-item' }}">
                                    <!-- CATEGORY HEADER -->
                                    <div class="accordion-thumb">
                                        <h4 class="s-20 w-700">{{ $item->question }}</h4>
                                    </div>
                                    <!-- CATEGORY ANSWERS -->
                                    <div class="accordion-panel">
                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">
                                            <!-- Text -->
                                            {!! $item->answer !!}
                                        </div> <!-- END QUESTION #1 -->
                                    </div> <!-- END CATEGORY ANSWERS -->
                                </li> <!-- END QUESTIONS CATEGORY #1 -->
                            @endforeach
                        </ul>
                    </div> <!-- END QUESTIONS ACCORDION -->
                    <!-- MORE QUESTIONS LINK -->
                    <div class="more-questions">
                        <div class="more-questions-txt bg--white-400 r-100">
                            <p class="p-lg">Punya Pertanyaan Lainnya? <a href="{{ route('contact') }}"
                                    class="color--theme">Hubungi Kami</a></p>
                        </div>
                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END FAQs-2 -->




    @push('js')
        {{-- call coursel owl --}}
        <script src="{{ asset('front-end/vendor/OwlCarousel/dist/owl.carousel.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    margin: 20,
                    loop: false,
                    autoplay: false,
                    autoplayHoverPause: false,
                    autoHeight: true,
                    dots: false,
                    // animateOut: 'slideOutLeft',\
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        768: {
                            items: 2,
                            nav: false
                        },
                        1000: {
                            items: 3,
                            nav: false,

                        }
                    }
                });
            });
        </script>
        {{-- owlcorousel --}}
    @endpush

@endsection
