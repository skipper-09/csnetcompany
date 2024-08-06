@extends('front-end.layout.base')

@section('title', $page_name)
@push('css')
{{-- owlcarosel --}}
<link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">
{{-- endowlcarosel --}}
<style>
    .hero-promo{
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
        @foreach ($promo as $item)
        <div><img class="fullscreen-img" src="{{ url('storage/images/promo/'.$item->logo) }}" alt="{{ $item->name }}">
        </div>
        @endforeach
    </div>
</section> <!-- END HERO-2 -->




<!-- PRICING-1
           ============================================= -->
@if(empty($packet))
<section id="pricing-1" class="gr--whitesmoke pb-40 inner-page-hero pricing-section">
    <div class="container">


        <!-- SECTION TITLE -->
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="section-title mb-70">
                    <!-- Title -->
                    <h2 class="s-40 w-700">Daftar Harga Paket Promo</h2>
                </div>
            </div>
        </div> <!-- END SECTION TITLE -->


        <!-- PRICING TABLES -->
        <div class="pricing-1-wrapper">
            <div class="row justify-content-center">
                @foreach ($packet as $item)
                <div class="col-md-4  gy-4 gap-4">
                    <div class="card shadow-sm w-60 r-16 border-none">
                        <div class="">
                            <div class="bg--heading division">
                                <div class="pricing-title ">
                                    <h5 class="text-center s-28 w-700 text-uppercase">{{ $item->name }}</h5>
                                </div>
                            </div>

                            <div class="tab-content px-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="one-month" role="tabpanel"
                                    aria-labelledby="one-month-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="list-unstyled mb-4">
                                                @foreach ($item->packetDescription as $des)
                                                <li class="d-flex align-items-center justify-content-start gap-2">
                                                    <img src="{{ url('storage/images/descrip/' . $des->logo) }}" alt=""
                                                        height="20"> {{ $des->name }}
                                                </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                        <div class="col-12 text-center mb-4">
                                            <h4>@currency($item->price)/{{ $item->duration }}</h4>
                                        </div>
                                        <div class=" text-center mb-4">
                                            <button type="button" class="btn btn--theme">Daftar</button>
                                        </div>
                                    </div>
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