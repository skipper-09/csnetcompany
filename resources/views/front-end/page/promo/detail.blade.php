@extends('front-end.layout.base')

@section('title', $page_name)


@push('css')
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">

    <style>
        #hero-2 {
            height: 100vh;
        }

        .bg--heading {
            background-position: center !important;
            background-repeat: no-repeat;
            background-size: cover !important;
        }

        .pricing-title {
            height: 150px !important;
            align-content: center !important;
            align-items: center !important;
        }

        .nav-tabs .nav-link {
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
        }



        .pricing {
            width: 100%;
            height: 100%;
        }

        .pricing .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1),
                0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 400px;
            margin: auto;
        }

        .owl-carousel {
            width: 100%;
        }
    </style>
@endpush

@section('content')

    <!-- SINGLE POST
                   ============================================= -->
    <section id="single-post" class="pb-90 inner-page-hero blog-page-section">
        <div class="container">
            <div class="row justify-content-center">


                <!-- SINGLE POST CONTENT -->
                <div class="col-xl-10">
                    <div class="post-content">


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



            <!-- PRICING-1
                                   ============================================= -->
            @if (count($promopaket)>0)


                <section id="pricing-1" class=" pb-40 pt-100">
                    <div class="container-fluid">


                        <!-- SECTION TITLE -->
                        <div class="align-self-start">
                            <div class="section-title mb-70">
                                <!-- Title -->
                                <h2 class="s-40 w-700">Daftar Harga <span class="text-capitalize">{{ $promo->name }}</span>
                                </h2>
                            </div>
                        </div> <!-- END SECTION TITLE -->

                        <!-- PRICING TABLES -->
                        <div class="pricing">
                            <div class="owl-carousel owl-theme">
                                @foreach ($promopaket as $item)
                                    <div class="card r-16 ">
                                        <div class="align-self-center">
                                            <div
                                                class="{{ $item->paket->best_seller == true ? 'bg--heading division' : 'bg-pricing division' }}">
                                                <div class="pricing-title ">
                                                    <h5 class="text-center s-28 w-700 text-uppercase">
                                                        {{ $item->paket->name }}
                                                    </h5>
                                                </div>
                                                <hr class="divider-gray">
                                            </div>

                                            <div class="tab-content px-4" id="myTabContent">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="color--grey text-uppercase d-flex">Fitur</p>
                                                        <ul class="list-unstyled mb-4">
                                                            @foreach ($item->paket->packetDescription as $des)
                                                                <li
                                                                    class="d-flex align-items-center justify-content-start gap-2">
                                                                    <img style="width: 30px"
                                                                        src="{{ url('storage/images/descrip/' . $des->logo) }}"
                                                                        alt="">
                                                                    {{ $des->name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-12 text-center mb-4">
                                                        <h4 style="color: #25316D" class="w-700">
                                                            @currency($item->paket->price)/{{ $item->paket->duration }}</h4>
                                                    </div>
                                                    <div class=" text-center mb-4">
                                                        <a href="https://forms.gle/JWxGAcGYQt2bmLf18">
                                                            <button type="button"
                                                                class="btn btn--theme btn-sm">Berlangganan
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
