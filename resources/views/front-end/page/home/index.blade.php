@extends('front-end.layout.base')

@section('title', $page_name)

@section('content')
    <!-- HERO-2                                                                       ============================================= -->
    <section id="hero-2" class="bg--10 hero-section">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">


                <!-- HERO IMAGE -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="hero-2-img wow fadeInRight">
                        <img class="img-fluid" src="{{ asset('front-end/images/hero-img2.png') }}" alt="hero-image">
                    </div>
                </div>


                <!-- HERO TEXT -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="hero-2-txt wow fadeInLeft">

                        <!-- Title -->
                        <h2 class="s-56 w-700 color--white">Layanan Internet Tanpa Batas!</h2>

                        <!-- Text -->
                        <p class="p-lg color--white">Ciptakan ekosistem digital bisnis bersama IDNET. Didukung dengan
                            konektivitas yang
                            handal dengan beragam pilihan Paket yang murah hingga layanan digital yang dapat membantu bisnis
                            Anda agar makin eksis.
                        </p>
                    </div>
                </div> <!-- END HERO TEXT -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END HERO-2 -->




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
                        @foreach ($partner as $item)
                            <div class="brand-logo p-2">
                                <a href="#"><img class="img-fluid"
                                        src="{{ url('storage/images/partner/' . $item->logo) }}" alt="brand-logo"></a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div> <!-- END BRANDS CAROUSEL -->
        </div> <!-- End container -->
    </div> <!-- END BRANDS-1 -->



    <!-- CEK AREA
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
    </section> <!-- END CEK AREA-2 -->

    <!-- DIVIDER LINE -->
    {{-- <hr class="divider"> --}}


    <!-- TEXT CONTENT
                                                                                                                                                                                                                                                                                                            ============================================= -->
    <section id="lnk-1" class="pt-100 ct-02 content-section division">
        <div class="container">


            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">


                <!-- IMAGE BLOCK -->
                <div class="col-md-6">
                    <div class="img-block left-column wow fadeInRight">
                        <img class="img-fluid" src="{{ asset('front-end/images/Group 832.png') }}" alt="content-image">
                    </div>
                </div>


                <!-- TEXT BLOCK -->
                <div class="col-md-6">
                    <div class="txt-block right-column wow fadeInLeft">

                        <!-- Section ID -->
                        <span class="section-id">BROADBAND</span>

                        <!-- Title -->
                        <h2 class="s-46 w-700">Internet Rumahan Yang Ramah di Kantong</h2>

                        <!-- Text -->
                        <p>Nikmati Akses Internet Cepat dan Terjangkau dengan Layanan Broadband Kami. Temukan Paket yang
                            Sesuai dengan Kebutuhan Anda dan Nikmati Koneksi Tak Terbatas!
                        </p>

                        <a href="{{ route('packet.ritel') }}"><button
                                class="btn btn-primary btn--theme">Selengkapnya</button></a>


                    </div> <!-- END SECTION CONTENT (ROW) -->


                </div> <!-- End container -->
    </section> <!-- END TEXT CONTENT -->










    <!-- TEXT CONTENT============================================= -->
    <section class="pt-100 ct-01 content-section division">
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
    </section> <!-- END TEXT CONTENT -->

    <!-- DIVIDER LINE -->

    <!-- BOX CONTENT============================================= -->
    <section class="pt-100 ws-wrapper content-section">
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
    </section> <!-- END BOX CONTENT -->


    <!-- FEATURES-============================================= -->
    <section id="features-11" class="pt-100 features-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-40 w-700">Kenapa Harus Memilih IDNET?</h2>

                        <!-- Text -->
                        {{-- <p class="s-21 color--grey">Ligula risus auctor tempus magna feugiat lacinia.</p> --}}

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
    </section> <!-- END FEATURES-11 -->


    <!-- TESTIMONIALS-1
                                                                                                                                                                                                                                                                                                            ============================================= -->
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


                        <!-- TESTIMONIAL #1 -->
                        <div class="review-1 bg--white-100 block-shadow r-08">

                            <!-- Quote Icon -->
                            <div class="review-ico ico-65"><span class="flaticon-quote"></span></div>

                            <!-- Text -->
                            <div class="review-txt">

                                <!-- Text -->
                                <p>Layanan pelanggan yang responsif dan ramah. Masalah koneksi saya cepat teratasi. Paket
                                    harga yang ditawarkan juga sangat kompetitif.
                                </p>

                                <!-- Author -->
                                <div class="author-data clearfix">

                                    <!-- Avatar -->
                                    <div class="review-avatar">
                                        <img src="{{ asset('front-end/images/review-author-1.jpg') }}"
                                            alt="review-avatar">
                                    </div>

                                    <!-- Data -->
                                    <div class="review-author">
                                        <h6 class="s-18 w-700">Scott Boxer</h6>
                                        <p class="p-sm">@scott_boxer</p>
                                    </div>

                                </div> <!-- End Author -->

                            </div> <!-- End Text -->

                        </div> <!-- END TESTIMONIAL #1 -->


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
                                <p>Kecepatan internet yang luar biasa! Streaming, gaming, dan download semua berjalan lancar
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
                                <p>Harga yang ditawarkan sesuai dengan kualitas. Kecepatan internet sangat memuaskan, bahkan
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
                                <p>Teknisi instalasi sangat ramah dan membantu. Prosesnya cepat dan saya mendapatkan panduan
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
                                <p>Sangat senang dengan layanan ini. Tidak ada gangguan sama sekali dan kecepatan internet
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

                        </div> <!-- END TESTIMONIAL #8 -->


                    </div>
                </div>
            </div> <!-- END TESTIMONIALS CONTENT -->


        </div> <!-- End container -->
    </section> <!-- END TESTIMONIALS-1 -->



    <section id="banner-12" class="banner-section pt-30">
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
    </section> <!-- END BANNER-12 -->


    <!-- FAQs-2-->
    <section id="faqs-2" class="gr--whitesmoke pb-30 inner-page-hero faqs-section division">
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
