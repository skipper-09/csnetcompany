@extends('front-end.layout.base')

@section('title', $page_name)


@push('css')
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/custom.css') }}">
@endpush

@section('content')
    <!-- SINGLE POST ============================================= -->
    <section id="single-post" class="pb-90 inner-page-hero blog-page-section">
        <div class="container">
            <div class="row justify-content-center mb-50">
                <!-- SINGLE POST CONTENT -->
                <div class="col-xl-10">
                    <div class="post-content justify-content-center text-center">
                        <!--  SINGLE POST TITLE -->
                        <div class="single-post-title text-center">
                            <!-- Post Tag -->
                            {{-- <span class="post-tag color--green-400">Community</span> --}}

                            <!-- Title -->
                            {{-- <h2 class="s-46 w-700 text-capitalize">{{ $promo->name }}</h2> --}}

                            {{-- <!-- Post Meta -->
                            <div class="blog-post-meta mt-35">
                                <ul class="post-meta-list ico-10">
                                    <li>
                                        <p class="p-md w-500">By Melissa McClone</p>
                                    </li>
                                    <li class="meta-list-divider">
                                        <p><span class="flaticon-minus"></span></p>
                                    </li>
                                    <li>
                                        <p class="p-md">April 29, 2023</p>
                                    </li>
                                </ul>
                            </div> --}}
                        </div> <!-- END SINGLE POST TITLE -->
                        <!-- SINGLE POST IMAGE -->
                        <div class="blog-post-img py-50">
                            <img class="img-fluid r-16" src="{{ url('storage/images/promo/' . $promo->logo) }}"
                                alt="blog-post-image">
                        </div>
                        <!-- SINGLE POST TEXT -->
                        <div class="single-post-txt">
                            {!! $promo->deskripsi !!}
                        </div> <!-- END SINGLE POST SHARE -->
                    </div>
                </div> <!-- END  SINGLE POST CONTENT -->
            </div> <!-- End row -->
            <!-- PRICING-1 ============================================= -->
            @if (count($promopaket) > 0)
                <!-- PRICING TABLES -->
                <section id="pricing-1" class="inner-page-hero pricing-section">
                    <div class="container">
                        <!-- SECTION TITLE -->
                        <div class="section-title mb-100">
                            <!-- Title -->
                            <h2 class="s-40 w-700">Daftar Harga <span
                                    class="text-capitalize">{{ $promo->name }}</span>
                            </h2>
                            <p class="p-xl">Pilih paket promo sesuai dengan kebutuhan Anda.</p>
                        </div> <!-- END SECTION TITLE -->
                        <!-- PRICING TABLES -->
                        <div class="pricing-1-wrapper">
                            <div class="row row-cols-1 row-cols-md-3">
                                <!-- STARTER PLAN -->
                                @foreach ($promopaket as $item)
                                    <div class="col">
                                        <div id="pt-1-1"
                                            class="p-table pricing-1-table bg--white-100 block-shadow r-12 wow fadeInUp">
                                            <!-- TABLE HEADER -->
                                            <div class="pricing-table-header">
                                                <!-- Title -->
                                                <h5 class="s-28 w-700">{{ $item->paket->speed }} Mbps</h5>
                                                <!-- Price -->
                                                <div class="price">
                                                    <h5 class="s-20 color--black w-700">@currency($item->paket->price) /
                                                        {{ $item->paket->duration }}</h5>
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
                                                @foreach ($item->paket->packetDescription as $des)
                                                    <li>
                                                        <img style="width: 24px; margin-right: 0.5rem"
                                                            src="{{ url('storage/images/descrip/' . $des->logo) }}"
                                                            alt="Description">
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
            @endif
            <!-- END PRICING-1 -->
        </div> <!-- End container -->
    </section> <!-- END SINGLE POST -->



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
