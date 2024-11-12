@extends('front-end.layout.base')

@section('title', $page_name)
@push('css')
    {{-- owlcarosel --}}
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">
    {{-- endowlcarosel --}}
    <style>
        .hero-promo {
            padding-top: 80px;
        }

        .img-hero {
            height: 500px
        }

        .bg--heading {
            background-position: center !important;
            background-repeat: no-repeat;
            background-size: cover !important;
        }

        .fullscreen-img {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures the image covers the entire element */
        }
    </style>
@endpush

@section('content')
    <!-- HERO-2
                                           ============================================= -->
    <section id="" class="hero-promo">
        <div class="owl-carousel">
            @foreach ($slider as $item)
                <div>
                    <a href="{{ route('packet.promo.detail', ['slug' => $item->slug]) }}">
                        <img class="fullscreen-img" src="{{ url('storage/images/promo/' . $item->logo) }}"
                            alt="{{ $item->name }}"></a>
                </div>
            @endforeach
        </div>
    </section> <!-- END HERO-2 -->



    <div class="container">
        <!-- BLOG POSTS CATEGORY -->
        <div class="row">
            <div class="col">
                <div class="posts-category ico-20 wow fadeInUp">
                    <h4 class="s-40 w-700">Promo Terbaru <span class="flaticon-next"></span></h4>
                    <p class="p-xl">Pilih paket promo sesuai dengan kebutuhan Anda.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container pt-30">
        <!-- POSTS WRAPPER -->
        <div class="posts-wrapper">
            <div class="row">

                @foreach ($promo as $item)
                    <!-- BLOG POST #1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-post mb-40 wow fadeInUp clearfix">


                            <!-- BLOG POST IMAGE -->
                            <div class="blog-post-img mb-35">
                                <img class="img-fluid r-16" src="{{ url('storage/images/promo/' . $item->logo) }}"
                                    alt="blog-post-image">
                            </div>


                            <!-- BLOG POST TEXT -->
                            <div class="blog-post-txt">

                                <!-- Post Tag -->
                                {{-- <span class="post-tag color--red-400">Product News</span> --}}

                                <!-- Post Link -->
                                <h6 class="s-20 w-700 text-capitalize">
                                    <a href="{{ route('packet.promo.detail', ['slug' => $item->slug]) }}">{{ $item->name }}
                                    </a>
                                </h6>

                                <!-- Text -->
                                <p>{{ $item->shortdeskripsi }}
                                </p>
                                {{-- <!-- Post Meta -->
                                <div class="blog-post-meta mt-20">
                                    <ul class="post-meta-list ico-10">
                                        <li>
                                            <p class="p-sm w-500">By Martex Team</p>
                                        </li>
                                        <li class="meta-list-divider">
                                            <p><span class="flaticon-minus"></span></p>
                                        </li>
                                        <li>
                                            <p class="p-sm">Apr 23, 2023</p>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div> <!-- END BLOG POST TEXT -->
                        </div>
                    </div> <!-- END BLOG POST #1 -->
                @endforeach
            </div>
        </div> <!-- END POSTS WRAPPER -->
    </div>

    <section id="banner-3" class="pt-100 banner-section pb-40">
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
                                <a href="https://wa.me/6282116879977?text=Halo"
                                    class="btn r-04 btn--tra-white hover--white">Hubungi Kami!</a>
                            </div>
                        </div> <!-- END BANNER-3 TEXT -->
                    </div> <!-- End row -->
                </div> <!-- End banner overlay -->
            </div> <!-- END BANNER-3 WRAPPER -->
        </div> <!-- End container -->
    </section> <!-- END BANNER-12 -->

    @push('js')
        {{-- call coursel owl --}}
        <script src="{{ asset('front-end/vendor/OwlCarousel/dist/owl.carousel.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    items: 1,
                    margin: 10,
                    autoHeight: false,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: false,
                    // animateOut: 'slideOutLeft',
                });
            });
        </script>
        {{-- owlcorousel --}}
    @endpush
@endsection
