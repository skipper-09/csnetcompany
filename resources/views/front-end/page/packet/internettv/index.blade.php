@extends('front-end.layout.base')

@section('title', $page_name)
@push('css')
@endpush


@section('content')
    <!-- HERO-25
           ============================================= -->
    <section id="hero-25" class="1gr--whitesmoke bg--fixed hero-section">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- HERO TEXT -->
                <div class="col-md-6">
                    <div class="hero-25-txt wow fadeInRight">

                        <!-- Section ID -->
                        <span class="section-id">INTERNET PLUS TV</span>

                        <!-- Title -->
                        <h2 class="s-52 w-700">Nikmati Layanan Tv dan Internet Secara Bersamaan</h2>

                        <!-- Text -->
                        <p class="p-lg">Jelajahi jendela dunia yang luas dengan teknologi 100% fiber optik serta dapatkan
                            kualitas internet stabil dan super cepat yang memiliki kemampuan symmetric bandwidth upload dan
                            download dan benar-benar unlimited tanpa FUP (Fair Usage Policy) serta Siaran Tv Full HD.
                        </p>

                        <!-- Button -->
                        <a href="#banner-3" class="btn r-04 btn--theme hover--theme">Berlangganan Sekarang</a>

                    </div>
                </div> <!-- END HERO TEXT -->


                <!-- HERO IMAGE -->
                <div class="col-md-6">
                    <div class="hero-25-img wow fadeInLeft">
                        <img class="img-fluid" src="{{ asset('front-end/images/img-tv.png') }}" alt="hero-image">
                    </div>
                </div>


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END HERO-25 -->




    <!-- FEATURES-7
           ============================================= -->
    <section id="features-7" class="pt-100 features-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-50 w-700">Fitur Unggulan IDTV</h2>

                        <!-- Text -->
                        <p class="s-21 color--grey">Nikmati Siaran chanel Tv Lokal dan Internasional dalam satu Perangkat
                        </p>

                    </div>
                </div>
            </div>


            <!-- FEATURES-7 WRAPPER -->
            <div class="fbox-wrapper text-center">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">


                    <!-- FEATURE BOX #1 -->
                    <div class="col">
                        <div class="fbox-7 fb-1 r-12 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico ico-50">
                                <div class="shape-ico color--theme">

                                    <!-- Vector Icon -->
                                    <span class="flaticon-layers-1"></span>

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
                                <h6 class="s-20 w-700">Integrated</h6>
                                <p class="p-sm">Feugiat primis ipsum and ultrice a semper lacus</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #1 -->


                    <!-- FEATURE BOX #2 -->
                    <div class="col">
                        <div class="fbox-7 fb-2 r-12 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico ico-50">
                                <div class="shape-ico color--theme">

                                    <!-- Vector Icon -->
                                    <span class="flaticon-click-1"></span>

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
                                <h6 class="s-20 w-700">Intuitive</h6>
                                <p class="p-sm">Feugiat primis ipsum and ultrice a semper lacus</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #2 -->


                    <!-- FEATURE BOX #3 -->
                    <div class="col">
                        <div class="fbox-7 fb-3 r-12 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico ico-50">
                                <div class="shape-ico color--theme">

                                    <!-- Vector Icon -->
                                    <span class="flaticon-prioritize"></span>

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
                                <h6 class="s-20 w-700">Flexible</h6>
                                <p class="p-sm">Feugiat primis ipsum and ultrice a semper lacus</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #3 -->


                    <!-- FEATURE BOX #4 -->
                    <div class="col">
                        <div class="fbox-7 fb-4 r-12 wow fadeInUp">

                            <!-- Icon -->
                            <div class="fbox-ico ico-50">
                                <div class="shape-ico color--theme">

                                    <!-- Vector Icon -->
                                    <span class="flaticon-analytics"></span>

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
                                <h6 class="s-20 w-700">Efficient</h6>
                                <p class="p-sm">Feugiat primis ipsum and ultrice a semper lacus</p>
                            </div>

                        </div>
                    </div> <!-- END FEATURE BOX #4 -->


                </div> <!-- End row -->
            </div> <!-- END FEATURES-7 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END FEATURES-7 -->





    <!-- IMAGE CONTENT
       ============================================= -->
    <section id="lnk-2" class="bg--05 bg--scroll ct-10 content-section division">
        <div class="section-overlay pt-100">
            <div class="container">


                <!-- SECTION TITLE -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9">
                        <div class="section-title color--white mb-70">

                            <!-- Title -->
                            <h2 class="s-50 w-700">Track the progress towards objectives with key results</h2>

                            <!-- Text -->
                            <p class="s-21">Ligula risus auctor tempus magna feugiat lacinia.</p>

                        </div>
                    </div>
                </div>


                <!-- IMAGE BLOCK -->
                <div class="row">
                    <div class="col">
                        <div class="img-block video-preview wow fadeInUp">

                            <!-- Play Icon -->
                            <a class="video-popup1" href="https://www.youtube.com/embed/SZEflIVnhH8">
                                <div class="video-btn video-btn-xl bg--theme">
                                    <div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
                                </div>
                            </a>

                            <!-- Preview Image -->
                            <img class="img-fluid" src="{{ asset('front-end/images/dashboard-06.png') }}" alt="video-preview">

                        </div>
                    </div>
                </div>


            </div> <!-- End container -->
        </div> <!-- End section overlay -->
    </section> <!-- END IMAGE CONTENT -->

@endsection
