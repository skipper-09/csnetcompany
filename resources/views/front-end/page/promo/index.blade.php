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
                    <h4 class="s-34 w-700">Promo Terbaru <span class="flaticon-next"></span></h4>
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
									<p>{{$item->shortdeskripsi}}
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
                                <img class="img-fluid" src="{{ asset('front-end/images/img-16.png') }}" alt="banner-image">
                            </div>
                        </div>
                    </div> <!-- End row -->
                </div> <!-- End banner overlay -->
            </div> <!-- END BANNER-12 WRAPPER -->


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
