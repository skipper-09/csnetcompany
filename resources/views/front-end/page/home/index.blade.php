@extends('front-end.layout.base')

@section('content')
    <!-- HERO-2
           ============================================= -->
    <section id="hero-2" class="bg--scroll hero-section">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- HERO IMAGE -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="hero-2-img wow fadeInRight">
                        <img class="img-fluid" src="{{ asset('front-end/images/hero-2-img.png') }}" alt="hero-image">
                    </div>
                </div>


                <!-- HERO TEXT -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="hero-2-txt wow fadeInLeft">

                        <!-- Title -->
                        <h2 class="s-56 w-700 color--black">Layanan Internet Tanpa Batas!</h2>

                        <!-- Text -->
                        <p class="p-lg">Ciptakan ekosistem digital bisnis bersama IDNET. Didukung dengan konektivitas yang
                            handal dengan beragam pilihan Paket yang murah hingga layanan digital yang dapat membantu bisnis
                            Anda agar makin eksis.
                        </p>

                        {{-- <!-- HERO DIGITS -->
                    <div class="hero-digits">


                        <!-- DIGIT BLOCK #1 -->
                        <div id="hd-1-1" class="wow fadeInUp">
                            <div class="hero-digits-block">

                                <!-- Digit -->
                                <div class="block-digit">
                                    <h2 class="s-46 statistic-number color--black">2<span>x</span></h2>
                                </div>

                                <!-- Text -->
                                <div class="block-txt">
                                    <p class="p-sm">Tempor sapien and quaerat placerat</p>
                                </div>

                            </div>
                        </div> <!-- END DIGIT BLOCK #1 -->


                        <!-- DIGIT BLOCK #2 -->
                        <div id="hd-1-2" class="wow fadeInUp">
                            <div class="hero-digits-block">

                                <!-- Digit -->
                                <div class="block-digit">
                                    <h2 class="s-46 statistic-number color--black">63<span>%</span></h2>
                                </div>

                                <!-- Text -->
                                <div class="block-txt">
                                    <p class="p-sm">Ligula suscipit vitae and rutrum turpis</p>
                                </div>

                            </div>
                        </div> <!-- END DIGIT BLOCK #2 -->


                    </div> <!-- END HERO DIGITS --> --}}

                    </div>
                </div> <!-- END HERO TEXT -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END HERO-2 -->




    <!-- CEK AREA
        ============================================= -->
    <section id="features-2" class="py-80 bg--white-500 features-section ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-30">
                        <!-- Title -->
                        <h2 class="s-30 w-700 ">Temukan Idnet di Area Kamu</h2>
                    </div>
                    <div class="d-flex gap-2 justify-content-center">
                        <input type="text" class="form-control w-50 rounded-5" placeholder="Kode Pos">
                        <button class="btn btn-sm btn--black hover--theme rounded-5">Cek Area</button>
                    </div>
                </div>
            </div>
        </div> <!-- End container -->
    </section> <!-- END CEK AREA-2 -->

    <!-- DIVIDER LINE -->
    <hr class="divider">




    <!-- FEATURES-2
        ============================================= -->
    <section id="features-2" class="py-100 features-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-50 w-700">Kenapa Harus Idnet</h2>

                        <!-- Text -->
                        <p class="s-21 color--grey">Idnet internet murah dengan kualitas terbaik</p>

                    </div>
                </div>
            </div>


            <!-- FEATURES-2 WRAPPER -->
            <div class="fbox-wrapper text-center">
                <div class="row row-cols-1 row-cols-md-3">


                    <!-- FEATURE BOX #1 -->
                    <div class="col">
                        <div class="fbox-2 fb-1 wow fadeInUp">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="{{ asset('front-end/images/f_01.png') }}" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">100% Fiber Optic</h6>
                                <p>Nikmati Koneksi Super Cepat dan Stabil dengan Teknologi Kabel Serat Optik Kami. Jelajahi
                                    Internet Tanpa Batas dengan Kecepatan dan Kualitas Terbaik!</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #1 -->


                    <!-- FEATURE BOX #2 -->
                    <div class="col">
                        <div class="fbox-2 fb-2 wow fadeInUp">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="{{ asset('front-end/images/f_05.png') }}" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">Customer Service 24/7</h6>
                                <p>Kami Siap Membantu Anda Setiap Saat! Dapatkan Dukungan Pelanggan 24/7 dari Tim Ahli Kami.
                                </p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #2 -->


                    <!-- FEATURE BOX #3 -->
                    <div class="col">
                        <div class="fbox-2 fb-3 wow fadeInUp">

                            <!-- Image -->
                            <div class="fbox-img gr--whitesmoke h-175">
                                <img class="img-fluid" src="{{ asset('front-end/images/f_02.png') }}" alt="feature-image">
                            </div>

                            <!-- Text -->
                            <div class="fbox-txt">
                                <h6 class="s-22 w-700">Harga Terjangkau</h6>
                                <p>Nikmati kecepatan internet tinggi tanpa menguras kantong. Paket kami dirancang untuk
                                    memberikan Anda nilai terbaik dengan harga yang sangat terjangkau.</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #3 -->


                </div> <!-- End row -->
            </div> <!-- END FEATURES-2 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END FEATURES-2 -->




    <!-- DIVIDER LINE -->
    <hr class="divider">

    <!-- TEXT CONTENT
        ============================================= -->
    <section id="lnk-1" class="pt-100 ct-02 content-section division">
        <div class="container">


            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">


                <!-- IMAGE BLOCK -->
                <div class="col-md-6">
                    <div class="img-block left-column wow fadeInRight">
                        <img class="img-fluid" src="{{ asset('front-end/images/img-06.png') }}" alt="content-image">
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

                        <!-- Small Title -->
                        <h5 class="s-24 w-700">Kenapa Broadband Home</h5>

                        <!-- CONTENT BOX #1 -->
                        <div class="cbox-1 ico-15">

                            <div class="ico-wrap color--theme">
                                <div class="cbox-1-ico"><span class="flaticon-check"></span></div>
                            </div>

                            <div class="cbox-1-txt">
                                <p>Biaya Bulanan Murah</p>
                            </div>

                        </div>

                        <!-- CONTENT BOX #2 -->
                        <div class="cbox-1 ico-15">

                            <div class="ico-wrap color--theme">
                                <div class="cbox-1-ico"><span class="flaticon-check"></span></div>
                            </div>

                            <div class="cbox-1-txt">
                                <p>Internet Unlimited
                                </p>
                            </div>

                        </div>

                        <!-- CONTENT BOX #3 -->
                        <div class="cbox-1 ico-15">

                            <div class="ico-wrap color--theme">
                                <div class="cbox-1-ico"><span class="flaticon-check"></span></div>
                            </div>

                            <div class="cbox-1-txt">
                                <p class="mb-0">Customer Service 24/7</p>
                            </div>

                        </div>

                    </div>
                </div> <!-- END TEXT BLOCK -->


            </div> <!-- END SECTION CONTENT (ROW) -->


        </div> <!-- End container -->
    </section> <!-- END TEXT CONTENT -->



    <!-- BOX CONTENT
           ============================================= -->
    <section class="pt-100 ws-wrapper content-section">
        <div class="container">
            <div class="bc-1-wrapper bg--02 bg--fixed r-16">
                <div class="section-overlay">
                    <div class="row d-flex align-items-center">
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



                            </div>
                        </div> <!-- END TEXT BLOCK -->
                        <!-- IMAGE BLOCK -->
                        <div class="col-md-6">
                            <div class="img-block left-column wow fadeInRight">
                                <img class="img-fluid" src="{{ asset('front-end/images/img-09.png') }}"
                                    alt="content-image">
                            </div>
                        </div>

                    </div> <!-- End row -->
                </div> <!-- End section overlay -->
            </div> <!-- End content wrapper -->
        </div> <!-- End container -->
    </section> <!-- END BOX CONTENT -->



    <!-- TEXT CONTENT
        ============================================= -->
    <section id="lnk-1" class="pt-100 ct-02 content-section division">
        <div class="container">


            <!-- SECTION CONTENT (ROW) -->
            <div class="row d-flex align-items-center">


                <!-- IMAGE BLOCK -->
                <div class="col-md-6">
                    <div class="img-block left-column wow fadeInRight">
                        <img class="img-fluid" src="{{ asset('front-end/images/img-06.png') }}" alt="content-image">
                    </div>
                </div>


                <!-- TEXT BLOCK -->
                <div class="col-md-6">
                    <div class="txt-block right-column wow fadeInLeft">

                        <!-- Section ID -->
                        <span class="section-id">INTERNET PLUS TV</span>

                        <!-- Title -->
                        <h2 class="s-46 w-700">Solusi Terbaik untuk Keluarga Modern</h2>

                        <!-- Text -->
                        <p>Gabungkan koneksi internet cepat dan berbagai saluran TV menarik dalam satu paket hemat. Nikmati
                            momen bersama keluarga dengan layanan yang memastikan semua kebutuhan hiburan dan konektivitas
                            Anda terpenuhi.
                        </p>
                    </div>
                </div> <!-- END TEXT BLOCK -->


            </div> <!-- END SECTION CONTENT (ROW) -->


        </div> <!-- End container -->
    </section> <!-- END TEXT CONTENT -->

   <!-- DIVIDER LINE -->
   <hr class="divider">
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
                                <p>Etiam sapien sagittis congue augue a massa varius egestas ultrice varius magna
                                    a tempus aliquet undo cursus suscipit
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
                                <p>At sagittis congue augue diam egestas magna an ipsum vitae purus ipsum primis
                                    and cubilia laoreet augue egestas a luctus donec ltrice ligula porta augue magna
                                    suscipit lectus gestas
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
                                <p>Mauris gestas magnis a sapien etiam sapien congue an augue egestas and ultrice
                                    vitae purus diam an integer congue magna ligula egestas magna suscipit
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
                                <p>Mauris donec a magnis sapien etiam pretium a congue augue volutpat lectus
                                    aenean magna and undo mauris lectus laoreet tempor egestas rutrum
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
                                <p>An augue cubilia undo laoreet magna suscipit egestas ipsum lectus purus ipsum
                                    and primis augue an ultrice ligula egestas suscipit a lectus gestas auctor
                                    tempus
                                    feugiat impedit
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
                                <p>An augue cubilia laoreet undo magna ipsum semper suscipit egestas magna ipsum
                                    ligula a vitae purus and ipsum primis cubilia magna suscipit
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
                                <p>Augue egestas porta tempus volutpat egestas augue cubilia laoreet a magna
                                    suscipit luctus dolor blandit vitae purus neque tempus an aliquet porta gestas
                                    rutrum blandit vitae
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
                                <p>Augue at vitae purus tempus egestas volutpat augue undo cubilia laoreet magna
                                    suscipit luctus dolor blandit at purus tempus feugiat impedit
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


    <!-- BRANDS-1
        ============================================= -->
    <div id="brands-1" class="py-100 brands-section">
        <div class="container">

            <!-- BRANDS TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="brands-title mb-50">
                        <h5 class="s-20 w-700">Partner Kami</h5>
                    </div>
                </div>
            </div>

            <!-- BRANDS CAROUSEL -->
            <div class="row">
                <div class="col text-center">
                    <div class="owl-carousel brands-carousel-6">


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="{{ asset('front-end/images/brand-1.png') }}"
                                    alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="{{ asset('front-end/images/brand-2.png') }}"
                                    alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="{{ asset('front-end/images/brand-3.png') }}"
                                    alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="{{ asset('front-end/images/brand-4.png') }}"
                                    alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="{{ asset('front-end/images/brand-5.png') }}"
                                    alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="{{ asset('front-end/images/brand-6.png') }}"
                                    alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="{{ asset('front-end/images/brand-7.png') }}"
                                    alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="{{ asset('front-end/images/brand-8.png') }}"
                                    alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="{{ asset('front-end/images/brand-9.png') }}"
                                    alt="brand-logo"></a>
                        </div>


                    </div>
                </div>
            </div> <!-- END BRANDS CAROUSEL -->


        </div> <!-- End container -->
    </div> <!-- END BRANDS-1 -->
   <!-- DIVIDER LINE -->
   <hr class="divider">
    <!-- FAQs-3
        ============================================= -->
    <section id="faqs-3" class="pt-100 faqs-section">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-50 w-700">Questions & Answers</h2>

                        <!-- Text -->
                        <p class="s-21 color--grey">Ligula risus auctor tempus magna feugiat lacinia.</p>

                    </div>
                </div>
            </div>


            <!-- FAQs-3 QUESTIONS -->
            <div class="faqs-3-questions">
                <div class="row">


                    <!-- QUESTIONS HOLDER -->
                    <div class="col-lg-6">
                        <div class="questions-holder">


                            <!-- QUESTION #1 -->
                            <div class="question mb-35 wow fadeInUp">

                                <!-- Question -->
                                <h5 class="s-22 w-700"><span>1.</span> Getting started with Martex</h5>

                                <!-- Answer -->
                                <p class="color--grey">Etiam amet mauris suscipit in odio integer congue metus
                                    and vitae arcu mollis blandit ultrice ligula egestas magna suscipit lectus magna
                                    suscipit luctus blandit and laoreet
                                </p>

                            </div>


                            <!-- QUESTION #2 -->
                            <div class="question mb-35 wow fadeInUp">

                                <!-- Question -->
                                <h5 class="s-22 w-700"><span>2.</span> What's inside the package?</h5>

                                <!-- Answer -->
                                <p class="color--grey">An enim nullam tempor sapien gravida donec ipsum and enim
                                    porta justo integer at velna vitae auctor integer congue undo magna laoreet
                                    augue pretium purus pretium ligula
                                </p>

                            </div>


                            <!-- QUESTION #3 -->
                            <div class="question mb-35 wow fadeInUp">

                                <!-- Question -->
                                <h5 class="s-22 w-700"><span>3.</span> How do I choose a plan?</h5>

                                <!-- Answer -->
                                <ul class="simple-list color--grey">

                                    <li class="list-item">
                                        <p>Fringilla risus, luctus mauris orci auctor purus ligula euismod pretium
                                            purus pretium rutrum tempor sapien
                                        </p>
                                    </li>

                                    <li class="list-item">
                                        <p>Nemo ipsam egestas volute undo turpis purus lipsum primis aliquam sapien
                                            quaerat sodales pretium a purus
                                        </p>
                                    </li>

                                </ul>

                            </div>


                        </div>
                    </div> <!-- END QUESTIONS HOLDER -->


                    <!-- QUESTIONS WRAPPER -->
                    <div class="col-lg-6">
                        <div class="questions-holder">


                            <!-- QUESTION #4 -->
                            <div class="question mb-35 wow fadeInUp">

                                <!-- Question -->
                                <h5 class="s-22 w-700"><span>4.</span> How does Martex handle my privacy?</h5>

                                <!-- Answer -->
                                <p class="color--grey">Quaerat sodales sapien euismod blandit purus a purus
                                    ipsum primis in cubilia laoreet augue luctus dolor luctus
                                </p>

                                <!-- Answer -->
                                <p class="color--grey">An enim nullam tempor sapien gravida donec congue metus.
                                    Vitae arcu mollis blandit integer nemo volute velna
                                </p>

                            </div>


                            <!-- QUESTION #5 -->
                            <div class="question mb-35 wow fadeInUp">

                                <!-- Question -->
                                <h5 class="s-22 w-700"><span>5.</span> I have an issue with my account</h5>

                                <!-- Answer -->
                                <p class="color--grey">Cubilia laoreet augue egestas and luctus donec curabite
                                    diam vitae dapibus libero and quisque gravida donec neque blandit justo
                                    aliquam molestie nunc sapien justo
                                </p>

                            </div>


                            <!-- QUESTION #6 -->
                            <div class="question mb-35 wow fadeInUp">

                                <!-- Question -->
                                <h5 class="s-22 w-700"><span>6.</span> Can I cancel at anytime?</h5>

                                <!-- Answer -->
                                <p class="color--grey">An enim nullam tempor sapien gravida donec ipsum and enim
                                    porta justo integer at velna vitae auctor integer congue undo magna laoreet
                                    augue pretium purus pretium ligula
                                </p>

                            </div>


                        </div>
                    </div> <!-- END QUESTIONS HOLDER -->


                </div> <!-- End row -->
            </div> <!-- END FAQs-3 QUESTIONS -->


            <!-- MORE QUESTIONS LINK -->
            <div class="row">
                <div class="col">
                    <div class="more-questions mt-40">
                        <div class="more-questions-txt bg--white-400 r-100">
                            <p class="p-lg">Have any questions?
                                <a href="contacts.html" class="color--theme">Get in Touch</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- End container -->
    </section> <!-- END FAQs-3 -->
@endsection
