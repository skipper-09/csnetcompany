@extends('front-end.layout.base')

@section('title', $page_name)
@push('css')
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/custom.css') }}">
    <style>
        .bg--heading {
            background-position: center !important;
            background-repeat: no-repeat;
            background-size: cover !important;
        }
    </style>
@endpush


@section('content')
    <!-- HERO-2-->
    <section id="hero-25" class="1gr--whitesmoke bg--fixed hero-section">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- HERO TEXT -->
                <div class="col-md-6">
                    <div class="hero-25-txt wow fadeInRight">

                        <!-- Section ID -->
                        <span class="section-id">INTERNET PLUS TV</span>

                        <!-- Title -->
                        <h2 class="s-50 w-700">Koneksi Internet Tercepat & Hiburan TV Terbaik</h2>

                        <!-- Text -->
                        <p class="p-lg">Gabungkan kecepatan internet yang stabil dengan tayangan TV premium untuk
                            pengalaman terbaik di rumah Anda.
                        </p>

                        <!-- Button -->
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSf1sPLmiSKLm76-xntqfTtDP4U-Doi_3pM3EagyOKA-4mtxHA/viewform" class="btn r-04 btn--theme hover--theme">Berlangganan Sekarang</a>

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

    <!-- FEATURES-12 -->
    <section id="features-12" class="shape--bg shape--white-500 pt-100 features-section division">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- TEXT BLOCK -->
                <div class="col-md-5">
                    <div class="txt-block left-column wow fadeInRight">

                        <!-- Title -->
                        <h2 class="s-46 w-700">Tonton Saluran TV Favorit Anda Tanpa Batas</h2>

                        <!-- Text -->
                        <p>Nikmati pengalaman menonton TV yang lebih baik dengan IDTV, layanan TV berbasis aplikasi yang
                            dapat diakses langsung dari rumah Anda.
                        </p>
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
                                        <h5 class="s-19 w-700">Akses Mudah</h5>
                                        <p>Tonton langsung dari Rumah Anda, hanya dengan mengakses siaran melalui aplikasi.
                                        </p>
                                    </div>

                                </div>

                                <!-- FEATURE BOX #2 -->
                                <div id="fb-12-2" class="fbox-12 bg--white-100 block-shadow r-12">

                                    <!-- Icon -->
                                    <div class="fbox-ico ico-50">
                                        <div class="shape-ico color--theme">

                                            <!-- Vector Icon -->
                                            <span class="flaticon-tutorial"></span>

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
                                        <h5 class="s-19 w-700">Pilihan Saluran Lengkap</h5>
                                        <p>Menyediakan berbagai saluran TV lokal dan internasional, dari hiburan hingga
                                            berita, olahraga, dan banyak lagi.</p>
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
                                            <span class="flaticon-pay-per-click"></span>

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
                                        <h5 class="s-19 w-700">Kualitas Streaming Terbaik</h5>
                                        <p>Nikmati siaran dengan kualitas HD yang jernih, tanpa gangguan.</p>
                                    </div>

                                </div>

                                <!-- FEATURE BOX #4 -->
                                <div id="fb-12-4" class="fbox-12 bg--white-100 block-shadow r-12">

                                    <!-- Icon -->
                                    <div class="fbox-ico ico-50">
                                        <div class="shape-ico color--theme">

                                            <!-- Vector Icon -->
                                            <span class="flaticon-taxes"></span>

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
                                        <h5 class="s-19 w-700">Antarmuka Ramah Pengguna</h5>
                                        <p>Navigasi mudah dan intuitif, membuat pengalaman menonton Anda lebih menyenangkan.
                                        </p>
                                    </div>

                                </div>


                            </div>


                        </div>
                    </div> <!-- End row -->
                </div> <!-- END FEATURES-12 WRAPPER -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END FEATURES-12 -->

    <section id="pricing-1" class="gr--whitesmoke pb-40 inner-page-hero pricing-section">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="section-title mb-70">
                        <!-- Title -->
                        <h2 class="s-40 w-700">
                            Daftar Harga Paket Internet Plus TV
                        </h2>
                        <!-- Text -->
                        <p class="p-xl">
                            Pilih paket internet TV yang sesuai dengan kebutuhan Anda.
                        </p>
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
                                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSf1sPLmiSKLm76-xntqfTtDP4U-Doi_3pM3EagyOKA-4mtxHA/viewform"
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

    <!-- FEATURES-7 -->
    <section id="features-7" class="pb-30 features-section division">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <img class="" src="{{ asset('front-end/images/BANNER 600X100CM.webp') }}" alt="">
            </div>
        </div> <!-- End container -->
    </section> <!-- END FEATURES-7 -->

    <!-- IMAGE CONTENT============================================= -->
    <section id="lnk-2" class="bg--05 bg--scroll ct-10 content-section division">
        <div class="section-overlay pt-100">
            <div class="container">
                <!-- SECTION TITLE -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9">
                        <div class="section-title color--white  mb-70">
                            <!-- Title -->
                            <h2 class="s-50 w-700 ">Layanan TV Terbaik</h2>
                            <!-- Text -->
                            <p class="s-21 ">Nikmati Layanan TV Full HD dirumahmu.</p>
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
                            <img class="img-fluid" src="{{ asset('front-end/images/IDTV.webp') }}" alt="video-preview">
                        </div>
                    </div>
                </div>
            </div> <!-- End container -->
        </div> <!-- End section overlay -->
    </section> <!-- END IMAGE CONTENT -->

    <!-- FAQs-2                                                                                                                                                                                                                                                                                                                  ============================================= -->
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
