@extends('front-end.layout.base')

@section('title', $page_name)
@push('css')
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/vendor/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/css/custom.css') }}">
    <style>
        #hero-2 {
            height: 100vh;
        }

        .bg--heading {
            background-position: center !important;
            background-repeat: no-repeat;
            background-size: cover !important;
        }


        /* .nav-tabs .nav-link {
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
                    } */



       
    </style>
@endpush

@section('content')
    <!-- HERO-5============================================= -->
    <section id="hero-5" class="bg--scroll hero-section">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- HERO TEXT -->
                <div class="col-md-6">
                    <div class="hero-5-txt wow fadeInRight">

                        <!-- Title -->
                        <h2 class="s-50 w-700">Konesi Internet Tanpa Batas</h2>

                        <!-- Text -->
                        <p class="p-lg">Nikmati kecepatan internet luar biasa untuk streaming, gaming, dan bekerja tanpa
                            hambatan dengan harga terjangkau.
                        </p>

                        <!-- Button -->
                        <a href="#banner-7" class="btn r-04 btn--theme hover--theme">Mulai Sekarang</a>

                    </div>
                </div> <!-- END HERO TEXT -->


                <!-- HERO IMAGE -->
                <div class="col-md-6">
                    <div class="hero-5-img wow fadeInLeft">
                        <img class="img-fluid" src="{{ asset('front-end/images/Group 832.png') }}" alt="hero-image">
                    </div>
                </div>


            </div> <!-- End row -->
        </div> <!-- End container -->


        <!-- WAVE SHAPE BOTTOM -->
        <div class="wave-shape-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 170">
                <path fill-opacity="1"
                    d="M0,160L120,160C240,160,480,160,720,138.7C960,117,1200,75,1320,53.3L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
                </path>
            </svg>
        </div>


    </section> <!-- END HERO-5 -->



    <!-- FEATURES-============================================= -->
    <section id="features-11" class="pt-100 features-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-40 w-700">Keunggulan Paket Broadband</h2>

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





    <!-- PRICING-1-->
    <section id="pricing-1" class="gr--whitesmoke pb-40 inner-page-hero pricing-section">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-40 w-700">Tentukan Bandwidth Sesuai Kebutuhanmu</h2>
                        <p class="p-xl">Sekarang saatnya menikmati kecepatan baru internet fiber ultra cepat dan
                            unlimited dari Idnet</p>
                    </div>
                </div>
            </div> <!-- END SECTION TITLE -->


            <!-- PRICING TABLES -->
            <div class="pricing ">
                <div class="owl-carousel ">
                    @foreach ($packet as $item)
                        <div class="card ">
                            <div class="align-self-center">
                                <div
                                    class="bg-pricing division">
                                    <div class="{{ $item->best_seller == true ? 'best-seller' : 'pricing-title' }}">
                                        <h5 class="text-center s-28 w-700 color--white">{{ $item->speed }}
                                            Mbps
                                        </h5>
                                    </div>
                                </div>


                                <div class="content">
                                    <h5 class="text-center s-26 w-700 text-uppercase">{{ $item->name }}
                                    </h5>
                                    <div class="row mt-2">
                                        <div class="col-12 px-4">
                                            <p class="text-uppercase fitur d-flex">Fitur</p>
                                            <ul class="list-unstyled">
                                                @foreach ($item->packetDescription as $des)
                                                    <li class="d-flex align-items-center justify-content-start gap-2">
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
                                                @currency($item->price)/{{ $item->duration }}</h4>
                                        </div>
                                        <div class=" text-center mb-4">
                                            <a href="https://forms.gle/JWxGAcGYQt2bmLf18">
                                                <button type="button" class="btn btn--theme btn-sm">Berlangganan
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
    </section> <!-- END PRICING-1 -->



    {{-- <!-- PRICING COMPARE
                                                                                                                                                                               ============================================= -->
    <section id="comp-table" class="pt-100 pb-60 pricing-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">
                        <!-- Title -->
                        <h2 class="s-34 w-700">Rekomendasi Perangkat Untuk Kecepatan Internet Maksimal</h2>
                    </div>
                </div>
            </div>


            <!-- PRICING COMPARE -->
            <div class="comp-table wow fadeInUp">

                <div class="">
                    <!-- Table -->
                    <div class="table-responsive mb-50">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th style="width: 50%;">Kecepatan Internet</th>
                                    <th style="width: 50%;">Rekomendasi Jumlah Perangkat</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <th>10 Mbps</th>
                                    <td class="color--black">1-4 Perangkat</td>

                                </tr>

                                <tr>
                                    <th>15 Mbps</th>
                                    <td class="color--black">4-8 Perangkat</td>
                                </tr>
                                <tr>
                                    <th>20 Mbps</th>
                                    <td class="color--black">4-8 Perangkat</td>
                                </tr>
                                <tr>
                                    <th>25 Mbps</th>
                                    <td class="color--black">4-8 Perangkat</td>
                                </tr>
                                <tr>
                                    <th>50 Mbps</th>
                                    <td class="color--black">4-8 Perangkat</td>
                                </tr>

                            </tbody>

                        </table>
                    </div> <!-- End Table -->

                </div>

            </div> <!-- END PRICING COMPARE -->
        </div> <!-- End container -->
    </section> <!-- END PRICING COMPARE -->
 --}}





    <!-- FAQs-2
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ============================================= -->
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


                            <!-- QUESTIONS CATEGORY #1 -->
                            <li class="accordion-item is-active">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-20 w-700">Apa itu Idnet?</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">
                                    <!-- Answer -->
                                    <div class="faqs-2-answer color--grey">
                                        <!-- Text -->
                                        <p>Idnet adalah perusahaan internet yang menggunakan teknologi Fiber-to-the-home
                                            (FTTH) dengan 100% fiber optic untuk memberikan layanan internet dan layanan
                                            lainnya secara maksimal untuk pelanggan.
                                        </p>

                                    </div> <!-- END QUESTION #1 -->
                                </div> <!-- END CATEGORY ANSWERS -->
                            </li> <!-- END QUESTIONS CATEGORY #1 -->
                            <!-- QUESTIONS CATEGORY #1 -->
                            <li class="accordion-item ">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-20 w-700">Bagaiman cara mengetahui Informasi mengenai Idnet?</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">
                                    <!-- Answer -->
                                    <div class="faqs-2-answer color--grey">
                                        <!-- Text -->
                                        <p>Kunjungi website : idnet.id atau email ke contact@idnet.id atau menghubungi call
                                            center 021-3000 1515, WA 0815 900 1515, media sosial Idnet atau datang langsung
                                            ke kantor kami.
                                        </p>

                                    </div> <!-- END QUESTION #1 -->
                                </div> <!-- END CATEGORY ANSWERS -->
                            </li> <!-- END QUESTIONS CATEGORY #1 -->
                            <!-- QUESTIONS CATEGORY #1 -->
                            <li class="accordion-item ">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-20 w-700">Bagaimana syarat & ketentuan untuk berlangganan layanan Idnet?
                                    </h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">
                                    <!-- Answer -->
                                    <div class="faqs-2-answer color--grey">
                                        <!-- Text -->
                                        <p>Syarat & ketentuan berlangganan :
                                        </p>
                                        <ol>
                                            <li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
                                            <li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
                                            <li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
                                            <li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
                                            <li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
                                            <li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
                                            <li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
                                        </ol>

                                    </div> <!-- END QUESTION #1 -->
                                </div> <!-- END CATEGORY ANSWERS -->
                            </li> <!-- END QUESTIONS CATEGORY #1 -->
                            <!-- QUESTIONS CATEGORY #1 -->
                            <li class="accordion-item ">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-20 w-700">Apa keunggulan dari layanan Idnet?</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">
                                    <!-- Answer -->
                                    <div class="faqs-2-answer color--grey">
                                        <!-- Text -->
                                        <ol>
                                            <li>Menggunakan teknologi Fiber-to-the-home (FTTH) dengan 100% fiber optic untuk
                                                memberikan layanan yang dapat diandalkan oleh pelanggan.</li>
                                            <li>Layanan internet unlimited, cepat, stabil serta dapat diandalkan.</li>
                                            <li>Memberikan "value for money" bagi pelanggan untuk kebutuhan terkini dan
                                                kebutuhan lainnya..</li>
                                            <li>Memiliki pelayanan pelanggan yang baik dengan dukungan call center, email
                                                dan social media.</li>
                                            <li>Memiliki billing untuk melihat informasi tagihan internet secara berkala.
                                            </li>
                                        </ol>

                                    </div> <!-- END QUESTION #1 -->
                                </div> <!-- END CATEGORY ANSWERS -->
                            </li> <!-- END QUESTIONS CATEGORY #1 -->
                            <!-- QUESTIONS CATEGORY #1 -->
                            <li class="accordion-item ">


                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-20 w-700">Berapa lama waktu pemasangan baru Idnet?</h4>
                                </div>


                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">
                                    <!-- Answer -->
                                    <div class="faqs-2-answer color--grey">
                                        <!-- Text -->
                                        <p>1 -3* hari setelah kesepakatan pelanggan & Indosat HiFi
                                            *Hanya estimasi, waktu pemasangan sebenarnya akan tergantung situasi di
                                            lapangan.
                                            Petugas Indosat Ooredoo Hutchison yang ditunjuk akan menghubungi pelanggan untuk
                                            kepastian pemasangan.
                                        </p>

                                    </div> <!-- END QUESTION #1 -->
                                </div> <!-- END CATEGORY ANSWERS -->
                            </li> <!-- END QUESTIONS CATEGORY #1 -->


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

@endsection
