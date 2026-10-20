@extends('front-end.layout.base')

@section('title', $page_name)

@push('css')
    <style>
        /* NAVBAR (home): putih solid */
        #header .wsmainfull,
        #header .wsmainfull.scroll {
            padding: 6px 0;
            background-color: #fff !important;
            box-shadow: 0 1px 0 rgba(10, 30, 70, 0.08);
        }

        #header .wsmenu>.wsmenu-list>li>a.h-link {
            color: #1b2a44;
        }

        #header .wsmenu>.wsmenu-list>li>a.h-link.active,
        #header .wsmenu>.wsmenu-list>li>a.h-link:hover {
            color: #0b4fa8 !important;
        }

        #header .logo-black {
            display: block !important;
        }

        #header .logo-white {
            display: none !important;
        }

        /* HERO CSNET */
        #hero-csnet {
            position: relative;
            overflow: hidden;
            background: #0b4fa8;
            color: #fff;
            font-family: "Plus Jakarta Sans", sans-serif;
            padding: 150px 0 48px;
        }

        #hero-csnet .hero-net {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 260px;
            opacity: 0.18;
            pointer-events: none;
        }

        #hero-csnet .container {
            position: relative;
        }

        .hcs-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(0, 1fr);
            gap: 40px;
            align-items: center;
        }

        .hcs-txt {
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        .hcs-eyebrow {
            align-self: flex-start;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.22);
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.06em;
        }

        .hcs-eyebrow .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #3ddc97;
        }

        #hero-csnet h1 {
            margin: 0;
            color: #fff;
            font-family: inherit;
            font-size: 64px;
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        #hero-csnet h1 span {
            color: #7fd8ff;
        }

        #hero-csnet .hcs-lead {
            margin: 0;
            font-size: 18px;
            line-height: 1.65;
            color: #d6e6fa;
            max-width: 520px;
        }

        .hcs-cta {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .hcs-btn {
            height: 56px;
            padding: 0 26px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .hcs-btn--white {
            background: #fff;
            color: #0b4fa8 !important;
        }

        .hcs-btn--white:hover {
            background: #e8f1fc;
        }

        .hcs-btn--outline {
            border: 1.5px solid rgba(255, 255, 255, 0.55);
            color: #fff !important;
            font-weight: 600;
        }

        .hcs-btn--outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #fff;
        }

        .hcs-usp {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 560px;
        }

        .hcs-usp div {
            display: flex;
            gap: 10px;
            align-items: center;
            font-size: 14px;
            font-weight: 600;
            color: #e6f0fc;
        }

        .hcs-img {
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            min-height: 560px;
        }

        .hcs-img .circle {
            position: absolute;
            left: 50%;
            bottom: 20px;
            width: 500px;
            height: 500px;
            transform: translateX(-50%);
            border-radius: 50%;
            background: #fff;
            opacity: 0.96;
        }

        .hcs-img .ring {
            position: absolute;
            left: 50%;
            bottom: -10px;
            width: 560px;
            height: 560px;
            transform: translateX(-50%);
            border-radius: 50%;
            border: 2px dashed rgba(127, 216, 255, 0.6);
        }

        .hcs-img img {
            position: relative;
            width: 100%;
            max-width: 540px;
            height: auto;
        }

        .hcs-area {
            position: relative;
            margin-top: -20px;
            background: #fff;
            border-radius: 18px;
            padding: 14px 14px 14px 28px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 24px 60px rgba(6, 30, 70, 0.3);
        }

        .hcs-area-title {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 210px;
        }

        .hcs-area-title strong {
            font-size: 16px;
            color: #1b2a44;
        }

        .hcs-area-title span {
            font-size: 13px;
            color: #5b6b84;
        }

        #hero-csnet .hcs-area button {
            flex: 0 0 auto;
            margin-left: auto;
            height: 56px;
            padding: 0 28px;
            border: 0;
            border-radius: 12px;
            background: #0b4fa8;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            white-space: nowrap;
        }

        .hcs-area button:hover {
            background: #083a7d;
        }

        @media (max-width: 991.98px) {
            #hero-csnet {
                padding: 110px 0 40px;
            }

            .hcs-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            #hero-csnet h1 {
                font-size: 48px;
            }

            .hcs-img {
                min-height: 0;
            }
        }

        @media (max-width: 767.98px) {
            #hero-csnet {
                padding: 90px 0 32px;
            }

            .hcs-txt {
                gap: 20px;
            }

            #hero-csnet h1 {
                font-size: 38px;
                line-height: 1.1;
            }

            #hero-csnet .hcs-lead {
                font-size: 16px;
            }

            .hcs-cta {
                flex-direction: column;
            }

            .hcs-btn {
                width: 100%;
                height: 52px;
            }

            .hcs-usp {
                gap: 8px;
            }

            .hcs-usp div {
                flex-direction: column;
                text-align: center;
                font-size: 12px;
                gap: 6px;
            }

            .hcs-img .circle {
                width: 300px;
                height: 300px;
            }

            .hcs-img .ring {
                width: 340px;
                height: 340px;
            }

            .hcs-img img {
                max-width: 340px;
            }

            .hcs-area {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
                padding: 18px;
            }

            .hcs-area-title {
                min-width: 0;
            }

            #hero-csnet .hcs-area button {
                height: 52px;
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
@endpush

@section('content')
    <section id="hero-csnet" class="hero-section">
        <svg class="hero-net" aria-hidden="true" viewBox="0 0 1440 260" preserveAspectRatio="none">
            <g fill="none" stroke="#9FE3FF" stroke-width="1">
                <path d="M0 120 L180 50 L360 100 L540 20 L720 80 L900 0 L1080 60 L1260 -20 L1440 40"></path>
                <path d="M0 180 L200 130 L420 170 L640 110 L860 160 L1080 100 L1300 150 L1440 120"></path>
                <path
                    d="M180 50 L200 130 M360 100 L420 170 M540 20 L640 110 M720 80 L860 160 M900 0 L1080 100 M1080 60 L1300 150 M1260 -20 L1440 120">
                </path>
            </g>
            <g fill="#9FE3FF">
                <circle cx="180" cy="50" r="3"></circle>
                <circle cx="360" cy="100" r="3"></circle>
                <circle cx="540" cy="20" r="3"></circle>
                <circle cx="720" cy="80" r="3"></circle>
                <circle cx="1080" cy="60" r="3"></circle>
            </g>
        </svg>

        <div class="container">
            <div class="hcs-grid">
                <!-- HERO TEXT -->
                <div class="hcs-txt wow fadeInLeft">
                    <div class="hcs-eyebrow"><span class="dot"></span>PT CAHAYA SENTRA INTERNET</div>
                    <h1>Internet Cepat &amp; Stabil, <span>Tanpa Batas.</span></h1>
                    <p class="hcs-lead">Koneksi super cepat untuk rumah dan bisnis Anda, dengan paket terjangkau dan tim
                        teknisi lokal yang siap membantu.</p>
                    <div class="hcs-cta">
                        <a href="{{ route('packet.ritel') }}" class="hcs-btn hcs-btn--white">
                            Lihat Paket
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M13 6l6 6-6 6"></path>
                            </svg>
                        </a>
                        <a href="https://wa.me/6282116879977?text=Halo" target="_blank" rel="noopener"
                            class="hcs-btn hcs-btn--outline">
                            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12a9 9 0 0 1-13.5 7.8L3 21l1.3-4.4A9 9 0 1 1 21 12z"></path>
                            </svg>
                            Chat WhatsApp
                        </a>
                    </div>
                    <div class="hcs-usp">
                        <div>
                            <svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none"
                                stroke="#7FD8FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 2L4 14h7l-1 8 9-12h-7z"></path>
                            </svg>
                            Unlimited tanpa FUP
                        </div>
                        <div>
                            <svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none"
                                stroke="#7FD8FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5l3 2"></path>
                            </svg>
                            Support 24/7
                        </div>
                        <div>
                            <svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none"
                                stroke="#7FD8FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s7-6.2 7-12a7 7 0 0 0-14 0c0 5.8 7 12 7 12z"></path>
                                <circle cx="12" cy="10" r="2.5"></circle>
                            </svg>
                            Teknisi lokal
                        </div>
                    </div>
                </div>

                <!-- HERO IMAGE -->
                <div class="hcs-img wow fadeInRight">
                    <div class="circle"></div>
                    <div class="ring"></div>
                    <img src="{{ asset('front-end/images/CSnet Team.png') }}" alt="Tim CSnet">
                </div>
            </div>

            <!-- CEK AREA -->
            <form class="hcs-area" action="{{ route('cekarea') }}" method="GET">
                <div class="hcs-area-title">
                    <strong>Cek ketersediaan area</strong>
                    <span>Pastikan CSnet sudah ada di lokasi Anda</span>
                </div>
                <button type="submit">Cek Sekarang</button>
            </form>
        </div>
    </section> <!-- END HERO CSNET -->

    <!-- BRANDS-1                                                                     ============================================= -->
    <div id="brands-carousel-5" class=" py-50 brands-section">
        <div class="container">

            {{-- <!-- BRANDS TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="brands-title mb-50">
                        <h5 class="s-46 w-700">Partner Kami</h5>
                    </div>
                </div>
            </div> --}}

            <!-- BRANDS CAROUSEL -->
            <div class="row">
                <div class="col text-center">
                    <div class="owl-carousel brands-carousel-5">
                        <!-- BRAND LOGO IMAGE -->
                        <!-- @foreach ($partner as $item)
                            <div class="brand-logo p-2">
                                <a href="#"><img class="img-fluid"
                                        src="{{ url('storage/images/partner/' . $item->logo) }}" alt="brand-logo"></a>
                            </div>
                        @endforeach -->

                    </div>
                </div>
            </div> <!-- END BRANDS CAROUSEL -->
        </div> <!-- End container -->
    </div> <!-- END BRANDS-1 -->

    <!-- FEATURES-============================================= -->
    {{-- <section id="features-11" class="pt-100 features-section division">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">
                        <!-- Title -->
                        <h2 class="s-40 w-700">Kenapa Harus Berlangganan CSNET?</h2>
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
                                <h6 class="s-22 w-700">100% Fiber Optic</h6>
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
    </section> --}}
    <!-- END FEATURES-11 -->

    <section id="features-12" class="shape--bg shape--white-500 pt-50 features-section division">
        <div class="container">
            <div class="row d-flex align-items-center">
                <!-- TEXT BLOCK -->
                <div class="col-md-5">
                    <div class="txt-block left-column wow fadeInRight">
                        <!-- Title -->
                        <h2 class="s-40 w-700">Kenapa Harus Berlangganan CSNET?</h2>
                        <!-- Text -->
                        <p>Kami menghadirkan solusi internet pintar dengan hasil yang nyata dan instan. Nikmati pengalaman
                            internet yang maksimal dengan teknologi terkini dan layanan terbaik dari CSNET.</p>
                        <!-- CONTENT BOX #1 -->
                        <div class="cbox-1 ico-15">

                            <div class="ico-wrap color--theme">
                                <div class="cbox-1-ico"><span class="flaticon-check"></span></div>
                            </div>

                            <div class="cbox-1-txt">
                                <p>
                                    Kecepatan Internet Tercepat dengan 100% Fiber Optic
                                </p>
                            </div>
                        </div>
                        <!-- CONTENT BOX #2 -->
                        <div class="cbox-1 ico-15">

                            <div class="ico-wrap color--theme">
                                <div class="cbox-1-ico"><span class="flaticon-check"></span></div>
                            </div>

                            <div class="cbox-1-txt">
                                <p>
                                    Layanan Pelanggan 24/7
                                </p>
                            </div>

                        </div>

                        <!-- CONTENT BOX #3 -->
                        <div class="cbox-1 ico-15">

                            <div class="ico-wrap color--theme">
                                <div class="cbox-1-ico"><span class="flaticon-check"></span></div>
                            </div>

                            <div class="cbox-1-txt">
                                <p class="mb-0">Harga Terjangkau, Kualitas Terbaik</p>
                            </div>

                        </div>

                    </div>
                </div> <!-- END TEXT BLOCK -->


                <!-- FEATURES-12 WRAPPER -->
                <div class="col-md-7">
                    <div class="fbox-12-wrapper wow fadeInLeft">
                        <div class="row">


                            <div class="col-md-6">

                                <!-- FEATURE BOX #1 -->
                                <div id="fb-12-1" class="fbox-12 bg--white-100 block-shadow r-12 mb-30">

                                    <!-- Icon -->
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
                                    </div> <!-- End Icon -->

                                    <!-- Text -->
                                    <div class="fbox-txt">
                                        <h5 class="s-19 w-700">
                                            Koneksi Internet yang Stabil dan Handal
                                        </h5>
                                        <p>
                                            Dengan teknologi fiber optic 100%, kami menjamin koneksi internet yang stabil
                                            dan tanpa gangguan, bahkan saat penggunaan intensif.
                                        </p>
                                    </div>

                                </div>

                                <!-- FEATURE BOX #2 -->
                                <div id="fb-12-2" class="fbox-12 bg--white-100 block-shadow r-12">

                                    <!-- Icon -->
                                    <div class="fbox-ico ico-50">
                                        <div class="shape-ico color--theme">

                                            <!-- Vector Icon -->
                                            <span class="flaticon-global"></span>

                                            <!-- Shape -->
                                            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
                                                    transform="translate(100 100)" />
                                            </svg>

                                        </div>
                                    </div> <!-- End Icon -->

                                    <!-- Text -->
                                    <div class="fbox-txt">
                                        <h5 class="s-19 w-700">Jaringan yang Ramah Lingkungan</h5>
                                        <p>Jaringan fiber optic CSNET lebih cepat, efisien, dan ramah lingkungan,
                                            menggunakan bahan hemat energi untuk mendukung keberlanjutan.</p>
                                    </div>

                                </div>


                            </div>


                            <div class="col-md-6">


                                <!-- FEATURE BOX #3 -->
                                <div id="fb-12-3" class="fbox-12 bg--white-100 block-shadow r-12 mb-30">

                                    <!-- Icon -->
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
                                    </div> <!-- End Icon -->

                                    <!-- Text -->
                                    <div class="fbox-txt">
                                        <h5 class="s-19 w-700">Komitmen Terhadap Kepuasan Pelanggan</h5>
                                        <p>
                                            Dengan jaringan 100% fiber optic yang stabil, kami memastikan layanan yang
                                            memenuhi dan melebihi harapan Anda.
                                        </p>
                                    </div>

                                </div>

                                <!-- FEATURE BOX #4 -->
                                <div id="fb-12-4" class="fbox-12 bg--white-100 block-shadow r-12">

                                    <!-- Icon -->
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
                                    </div> <!-- End Icon -->

                                    <!-- Text -->
                                    <div class="fbox-txt">
                                        <h5 class="s-19 w-700">Tim Teknisi Handal</h5>
                                        <p>Tim teknisi kami yang terlatih dan berpengalaman siap memberikan solusi terbaik
                                            untuk setiap masalah teknis Anda.</p>
                                    </div>

                                </div>


                            </div>


                        </div>
                    </div> <!-- End row -->
                </div> <!-- END FEATURES-12 WRAPPER -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END FEATURES-12 -->

    {{-- <!-- CEK AREA
                                                                                                                                                                                                                                                                                                                    ============================================= -->
    <section id="features-2" class="py-50 features-section division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-30">
                        <!-- Title -->
                        <h2 class="s-30 w-700 ">Temukan Idnet di Area Kamu</h2>
                    </div>
                    <form action="{{ route('coverage') }}" method="get">
                        <div class="d-flex gap-2 justify-content-center">
                            <input type="text" value="{{ request('query') }}" name="query"
                                class="form-control w-50 rounded-5" placeholder="Kode Pos">
                            <button class="btn btn-primary btn--theme rounded-5" type="submit">Cek Area</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- End container -->
    </section> <!-- END CEK AREA-2 --> --}}

    <!-- DIVIDER LINE -->
    {{-- <hr class="divider"> --}}

    <!-- TEXT CONTENT============================================= -->
    {{-- <section class="pt-100 ct-01 content-section division">
        <div class="container">
            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">
                <!-- TEXT BLOCK -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="txt-block left-column wow fadeInRight">
                        <!-- Section ID -->
                        <span class="section-id">INTERNET PLUS TV</span>
                        <!-- Title -->
                        <h2 class="s-44 w-700">Solusi Terbaik untuk Keluarga Modern</h2>
                        <!-- Text -->
                        <p>Gabungkan koneksi internet cepat dan berbagai saluran TV menarik dalam satu paket hemat. Nikmati
                            momen bersama keluarga dengan layanan yang memastikan semua kebutuhan hiburan dan konektivitas
                            Anda terpenuhi.
                        </p>
                        <a href="{{ route('packet.internettv') }}"><button
                                class="btn btn-primary btn--theme">Selengkapnya</button></a>
                    </div>
                </div> <!-- END TEXT BLOCK -->
                <!-- IMAGE BLOCK -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="img-block right-column wow fadeInLeft">
                        <img class="img-fluid" src="{{ asset('front-end/images/img-tv.png') }}" alt="content-image">
                    </div>
                </div>
            </div> <!-- END SECTION CONTENT (ROW) -->
        </div> <!-- End container -->
    </section> <!-- END TEXT CONTENT --> --}}

    <section id="lnk-1" class="py-100 ct-01 content-section division">
        <div class="container">
            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">
                <!-- TEXT BLOCK -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="txt-block left-column wow fadeInRight">
                        <!-- Section ID -->
                        <span class="section-id">BROADBAND</span>
                        <!-- Title -->
                        <h2 class="s-44 w-700">Internet Rumahan Yang Ramah di Kantong</h2>
                        <!-- Text -->
                        <p>Nikmati Akses Internet Cepat dan Terjangkau dengan Layanan Broadband Kami. Temukan Paket yang
                            Sesuai dengan Kebutuhan Anda dan Nikmati Koneksi Tak Terbatas!
                        </p>
                        <a href="{{ route('packet.ritel') }}"><button
                                class="btn btn-primary btn--theme">Selengkapnya</button></a>
                    </div>
                </div> <!-- END TEXT BLOCK -->
                <!-- IMAGE BLOCK -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="img-block right-column wow fadeInLeft">
                        <img class="img-fluid r-04" src="{{ asset('front-end/images/sample.jpg') }}" alt="content-image">
                    </div>
                </div>
            </div> <!-- END SECTION CONTENT (ROW) -->
        </div> <!-- End container -->
    </section> <!-- END TEXT CONTENT -->

    {{-- <section class="pt-100 ct-01 content-section division">
        <div class="container">
            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">
                <!-- TEXT BLOCK -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="txt-block left-column wow fadeInRight">
                        <!-- Section ID -->
                        <span class="section-id">INTERNET PLUS TV</span>
                        <!-- Title -->
                        <h2 class="s-44 w-700">Solusi Terbaik untuk Keluarga Modern</h2>
                        <!-- Text -->
                        <p>Gabungkan koneksi internet cepat dan berbagai saluran TV menarik dalam satu paket hemat. Nikmati
                            momen bersama keluarga dengan layanan yang memastikan semua kebutuhan hiburan dan konektivitas
                            Anda terpenuhi.
                        </p>
                        <a href="{{ route('packet.internettv') }}"><button
                                class="btn btn-primary btn--theme">Selengkapnya</button></a>
                    </div>
                </div> <!-- END TEXT BLOCK -->
                <!-- IMAGE BLOCK -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="img-block right-column wow fadeInLeft">
                        <img class="img-fluid" src="{{ asset('front-end/images/img-tv.png') }}" alt="content-image">
                    </div>
                </div>
            </div> <!-- END SECTION CONTENT (ROW) -->
        </div> <!-- End container -->
    </section> --}}

    <!-- TEXT CONTENT============================================= -->
    <section class="py-100 ct-02 content-section division">
        <div class="container">
            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">
                <!-- IMAGE BLOCK -->
                <div class="col-md-6">
                    <div class="img-block left-column wow fadeInRight">
                        <img class="img-fluid" src="{{ asset('front-end/images/sample 2.png') }}" alt="content-image">
                    </div>
                </div>
                <!-- TEXT BLOCK -->
                <div class="col-md-6">
                    <div class="txt-block right-column wow fadeInLeft">
                        <!-- Section ID -->
                        <span class="section-id">INTERNET PLUS TV</span>
                        <!-- Title -->
                        <h2 class="s-46 w-700">Paket Lengkap untuk Keluarga Masa Kini</h2>
                        <!-- Text -->
                        <p>
                            Gabungkan koneksi internet super cepat dan berbagai saluran TV seru dalam satu paket hemat.
                            Nikmati waktu berkualitas bersama keluarga dengan layanan yang memuaskan semua kebutuhan hiburan
                            dan konektivitas Anda.
                        </p>
                        <a href="{{ route('packet.internettv') }}"><button
                                class="btn btn-primary btn--theme">Selengkapnya</button></a>
                    </div> <!-- END SECTION CONTENT (ROW) -->
                </div> <!-- End container -->
    </section> <!-- END TEXT CONTENT -->

    <!-- BOX CONTENT============================================= -->
    {{-- <section class="pt-100 ws-wrapper content-section">
        <div class="container">
            <div class="bc-1-wrapper ">
                <div class="section-overlay">
                    <div class="row d-flex align-items-center">

                        <!-- IMAGE BLOCK -->
                        <div class="col-md-6">
                            <div class="img-block left-column wow fadeInRight">
                                <img class="img-fluid r-04" src="{{ asset('front-end/images/img-07.png') }}"
                                    alt="content-image">
                            </div>
                        </div>
                        <!-- TEXT BLOCK -->
                        <div class="col-md-6">
                            <div class="txt-block right-column wow fadeInLeft">

                                <!-- Section ID -->
                                <span class="section-id">DEDICATED</span>

                                <!-- Title -->
                                <h2 class="s-46 w-700">Internet Dedicated untuk Bisnis Anda</h2>

                                <!-- Text -->
                                <p>Dengan internet dedicated, Anda mendapatkan koneksi yang stabil dan terjamin. Layanan ini
                                    dirancang khusus untuk memberikan performa terbaik tanpa gangguan, memastikan bisnis
                                    Anda selalu terhubung.
                                </p>

                                <a href="{{ route('packet.dedicated') }}"><button
                                        class="btn btn-primary btn--theme">Selengkapnya</button></a>

                            </div>
                        </div> <!-- END TEXT BLOCK -->
                    </div> <!-- End row -->
                </div> <!-- End section overlay -->
            </div> <!-- End content wrapper -->
        </div> <!-- End container -->
    </section> <!-- END BOX CONTENT --> --}}

    <section class="py-100 ct-03 content-section division">
        <div class="container">
            <div class="row d-flex align-items-center">
                <!-- TEXT BLOCK -->
                <div class="col-md-6 col-lg-5 order-last order-md-2">
                    <div class="txt-block left-column wow fadeInRight">
                        <!-- Section ID -->
                        <span class="section-id">DEDICATED</span>

                        <!-- Title -->
                        <h2 class="s-46 w-700">Internet Dedicated untuk Bisnis Anda</h2>

                        <!-- Text -->
                        <p>
                            Dengan internet dedicated, Anda mendapatkan koneksi stabil dan handal yang dirancang khusus
                            untuk bisnis, memastikan performa optimal tanpa gangguan.
                        </p>

                        <!-- List -->
                        <ul class="simple-list">
                            <li class="list-item">
                                <p>Koneksi internet yang terjamin stabil, mendukung kelancaran operasional bisnis Anda
                                    sepanjang waktu.</p>
                            </li>
                            <li class="list-item">
                                <p class="mb-0">Layanan prioritas tinggi yang memberikan kecepatan maksimal tanpa
                                    gangguan.</p>
                            </li>
                        </ul>

                        <a href="{{ route('packet.dedicated') }}">
                            <button class="btn btn-primary btn--theme">
                                Selengkapnya
                            </button>
                        </a>
                    </div>
                </div> <!-- END TEXT BLOCK -->
                <!-- IMAGE BLOCK -->
                <div class="col-md-6 col-lg-7 order-first order-md-2">
                    <div class="img-block right-column wow fadeInLeft">
                        <img class="img-fluid" src="{{ asset('front-end/images/img-14.png') }}" alt="content-image">
                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>

    <!-- TESTIMONIALS-1                                                                                                                                                                                                                                                                                                                                                                                              ============================================= -->
    <section id="reviews-1" class="pt-100 shape--06 shape--gr-whitesmoke reviews-section">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">
                        <!-- Title -->
                        <h2 class="s-50 w-700">Apa Kata Mereka?</h2>
                        <!-- Text -->
                        <p class="s-21 color--grey">Pengalaman Mereka dengan Layanan Internet Kami!</p>
                    </div>
                </div>
            </div>
            <!-- TESTIMONIALS CONTENT -->
            <div class="row">
                <div class="col">
                    <div class="owl-carousel owl-theme reviews-1-wrapper">
                        @if (isset($review) && is_array($review) && count($review) > 0)
                            @foreach ($review as $item)
                                <!-- TESTIMONIAL #1 -->
                                <div class="review-1 bg--white-100 block-shadow r-08">
                                    <!-- Quote Icon -->
                                    <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>
                                    <!-- Text -->
                                    <div class="review-txt">
                                        <!-- Text -->
                                        <p>{{ htmlspecialchars($item['review_text']) }}
                                        </p>
                                        <!-- Author -->
                                        <div class="author-data clearfix">
                                            <!-- Avatar -->
                                            <div class="review-avatar">
                                                <img src="{{ htmlspecialchars($item['author_image']) }}"
                                                    alt="review-avatar" class="img-fluid">
                                            </div>
                                            <!-- Data -->
                                            <div class="review-author">
                                                <h6 class="s-18 w-700">{{ htmlspecialchars($item['author_title']) }}</h6>
                                                <p class="p-sm">{{ htmlspecialchars($item['author_title']) }}</p>
                                            </div>
                                        </div> <!-- End Author -->
                                    </div> <!-- End Text -->
                                </div> <!-- END TESTIMONIAL #1 -->
                            @endforeach
                        @endif

                        {{-- 
                        <!-- TESTIMONIAL #2 -->
                        <div class="review-1 bg--white-100 block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Text -->
                                <p>Proses instalasi cepat dan teknisinya sangat profesional. Internet stabil dan cepat,
                                    sangat cocok untuk kebutuhan sehari-hari saya.
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="{{ asset('front-end/images/review-author-2.jpg') }}"
                                            alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Joel Peterson</h6>
                                        <p class="p-sm">Internet Surfer</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div> <!-- END TESTIMONIAL #2 -->


                        <!-- TESTIMONIAL #3 -->
                        <div class="review-1 bg--white-100 block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Text -->
                                <p>Kecepatan internet yang luar biasa! Streaming, gaming, dan download semua berjalan
                                    lancar
                                    tanpa hambatan. Sangat puas dengan layanan ini.
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="{{ asset('front-end/images/review-author-3.jpg') }}"
                                            alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Marisol19</h6>
                                        <p class="p-sm">@marisol19</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div> <!-- END TESTIMONIAL #3 -->


                        <!-- TESTIMONIAL #4 -->
                        <div class="review-1 bg--white-100 block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Text -->
                                <p>Harga yang ditawarkan sesuai dengan kualitas. Kecepatan internet sangat memuaskan,
                                    bahkan
                                    saat banyak perangkat terhubung.
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="{{ asset('front-end/images/review-author-4.jpg') }}"
                                            alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Leslie D.</h6>
                                        <p class="p-sm">Web Developer</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div> <!-- END TESTIMONIAL #4 -->


                        <!-- TESTIMONIAL #5 -->
                        <div class="review-1 bg--white-100 block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Text -->
                                <p>Konektivitas yang sangat stabil dan kecepatan yang konsisten. Saya dapat bekerja dari
                                    rumah tanpa masalah.
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="{{ asset('front-end/images/review-author-5.jpg') }}"
                                            alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Jennifer Harper</h6>
                                        <p class="p-sm">App Developer</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div> <!-- END TESTIMONIAL #5 -->


                        <!-- TESTIMONIAL #6 -->
                        <div class="review-1 bg--white-100 block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Text -->
                                <p>Teknisi instalasi sangat ramah dan membantu. Prosesnya cepat dan saya mendapatkan
                                    panduan
                                    lengkap tentang cara menggunakan layanan.
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="{{ asset('front-end/images/review-author-6.jpg') }}"
                                            alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Jonathan Barnes</h6>
                                        <p class="p-sm">jQuery Programmer</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div> <!-- END TESTIMONIAL #6 -->


                        <!-- TESTIMONIAL #7 -->
                        <div class="review-1 bg--white-100 block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Text -->
                                <p>Sangat senang dengan layanan ini. Tidak ada gangguan sama sekali dan kecepatan
                                    internet
                                    selalu sesuai dengan yang dijanjikan.
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="{{ asset('front-end/images/review-author-7.jpg') }}"
                                            alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Mike Harris</h6>
                                        <p class="p-sm">Graphic Designer</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div> <!-- END TESTIMONIAL #7 -->


                        <!-- TESTIMONIAL #8 -->
                        <div class="review-1 bg--white-100 block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Text -->
                                <p>Paket harga yang fleksibel dan banyak pilihan. Layanan pelanggan selalu siap membantu
                                    kapan pun saya membutuhkannya.
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="{{ asset('front-end/images/review-author-8.jpg') }}"
                                            alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Evelyn Martinez</h6>
                                        <p class="p-sm">WordPress Consultant</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div> <!-- END TESTIMONIAL #8 --> --}}


                    </div>
                </div>
            </div> <!-- END TESTIMONIALS CONTENT -->


        </div> <!-- End container -->
    </section> <!-- END TESTIMONIALS-1 -->

    <section id="banner-3" class="pt-100 banner-section">
        <div class="container">
            <!-- BANNER-3 WRAPPER -->
            <div class="banner-3-wrapper bg--05 bg--scroll r-16">
                <div class="banner-overlay">
                    <div class="row">
                        <!-- BANNER-3 TEXT -->
                        <div class="col">
                            <div class="banner-3-txt color--white">
                                <!-- Title -->
                                <h2 class="s-48 w-700">Ceritakan Kebutuhan & Permasalahan Anda</h2>

                                <!-- Text -->
                                <p class="p-xl">Kami akan menawarkan solusi teknologi yang tepat untuk kebutuhan anda,
                                    memungkinakan anda untuk memperluas jangkauam bisnis muncul sebagai pemenang ditengah
                                    persaingan bisnis yang ketat.</p>

                                <!-- Button -->
                                <a href="https://wa.me/6282111777179?text=Halo"
                                    class="btn r-04 btn--tra-white hover--white">Hubungi Kami!</a>
                            </div>
                        </div> <!-- END BANNER-3 TEXT -->
                    </div> <!-- End row -->
                </div> <!-- End banner overlay -->
            </div> <!-- END BANNER-3 WRAPPER -->
        </div> <!-- End container -->
    </section>

    {{-- <section id="banner-12" class="banner-section pt-30">
        <div class="container">
            <!-- BANNER-12 WRAPPER -->
            <div class="banner-12-wrapper bg--03 bg--scroll r-16 ">
                <div class="banner-overlay">
                    <div class="row d-flex align-items-center">
                        <!-- BANNER-12 TEXT -->
                        <div class="col-md-7">
                            <div class="banner-12-txt color--white py-4">

                                <!-- Title -->
                                <h2 class="s-50 w-700">Ceritakan Kebutuhan & Permasalahan Anda</h2>

                                <!-- Text -->
                                <p class="p-lg">Kami akan menawarkan solusi teknologi yang tepat untuk kebutuhan anda,
                                    memungkinakan anda untuk memperluas jangkauam bisnis muncul sebagai pemenang ditengah
                                    persaingan bisnis yang ketat.
                                </p>

                                <!-- Button -->
                                <a href="https://wa.me/6282116879977?text=Halo"
                                    class="btn r-04 btn--theme hover--tra-white">Hubungi Kami!</a>

                            </div>
                        </div> <!-- END BANNER-12 TEXT -->


                        <!-- BANNER-12 IMAGE -->
                        <div class="col-md-5">
                            <div class="banner-12-img text-center">
                                <img class="img-fluid" src="{{ asset('front-end/images/img-16.png') }}"
                                    alt="banner-image">
                            </div>
                        </div>
                    </div> <!-- End row -->
                </div> <!-- End banner overlay -->
            </div> <!-- END BANNER-12 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END BANNER-12 --> --}}

    <!-- FAQs-2-->
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
@endsection
