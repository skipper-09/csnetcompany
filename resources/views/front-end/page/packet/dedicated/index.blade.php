@extends('front-end.layout.base')

@section('title', $page_name)
@push('css')
    <style>
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

        .custom-img {
            width: 100%;
            /* Ensures the image takes the full width of its container */
            max-width: 800px;
            /* Sets a maximum width for the image */
            height: auto;
            /* Keeps the aspect ratio of the image */
            max-height: 600px;
            /* Sets a maximum height for the image */
            object-fit: contain;
            /* Ensures the image fits within the container without distortion */
        }
    </style>
@endpush

@section('content')
    <section id="hero-2" class="bg--business hero-section">
        <div class="container text-center">
            <div class="d-flex align-self-center justify-content-center pt-100">
                <div class="col-md-12 col-lg-9 order-first order-md-2">
                    <div class="hero-2-txt wow fadeInLeft">

                        <!-- Title -->
                        <h2 class="s-56 w-700 color--white">Internet Bisnis Profesional</h2>

                        <!-- Text -->
                        <p class="p-lg color--white">
                            Kecepatan dan keandalan adalah faktor utama untuk mendukung kesuksesan bisnis Anda.
                            Dengan Dedicated Business Internet Wifi, nikmati akses internet eksklusif dan stabil yang
                            dirancang khusus untuk memenuhi kebutuhan bisnis Anda tanpa kompromi.
                        </p>

                    </div>
                </div> <!-- END HERO TEXT -->
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END HERO-2 -->

    <!-- IMAGE CONTENT============================================= -->
    <section id="lnk-3" class=" ct-10 content-section division">
        <div class="section-overlay pt-100">
            <div class="container">
                <!-- SECTION TITLE -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9">
                        <div class="section-title mb-70">
                            <!-- Title -->
                            <h2 class="s-46 w-700">Performa Jaringan Maksimal</h2>
                            <!-- Text -->
                            <p class="s-20">CSnet Dedicated Internet memberi Anda konektivitas internet berkecepatan
                                tinggi dengan
                                bandwidth simetris (1:1) untuk memastikan kinerja
                                jaringan terbaik kapan saja. Infrastruktur telah dirancang dengan keandalan tinggi guna
                                memastikan operasi
                                perusahaan
                                Anda selalu berjalan lancar.</p>
                        </div>
                    </div>
                </div>
                <!-- IMAGE BLOCK -->
                <div class="row">
                    <div class="col">
                        <div class="img-block video-preview wow fadeInUp">
                            {{--
						<!-- Play Icon -->
						<a class="video-popup2" href="https://www.youtube.com/watch?v=7e90gBu4pas">
							<div class="video-btn video-btn-xl bg--theme">
								<div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
							</div>
						</a> --}}
                            <!-- Preview Image -->
                            <img class="img-fluid custom-img" src="{{ asset('front-end/images/dedicated.png') }}"
                                alt="video-preview">
                        </div>
                    </div>
                </div>
            </div> <!-- End container -->
        </div> <!-- End section overlay -->
    </section> <!-- END IMAGE CONTENT -->

    <section id="features-7" class="pt-100 features-section division">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">
                        <!-- Title -->
                        <h2 class="s-50 w-700">Fitur Layanan</h2>
                        <!-- Text -->
                        <p class="s-21 color--grey">
                            Jelajahi berbagai fitur unggulan yang kami tawarkan untuk memenuhi kebutuhan Anda. Dari
                            kecepatan tinggi, koneksi tanpa batas, hingga layanan pelanggan yang responsif.
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
                                <p class="p-sm">Solusi internet yang terintegrasi untuk mendukung berbagai kebutuhan
                                    bisnis Anda dengan mudah.</p>
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
                                <p class="p-sm">Antarmuka yang intuitif untuk memudahkan penggunaan dan pengelolaan
                                    layanan internet Anda.</p>
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
                                <p class="p-sm">Fleksibilitas tinggi dalam mengatur layanan sesuai kebutuhan spesifik
                                    bisnis Anda.</p>
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
                                <p class="p-sm">Meningkatkan efisiensi operasional melalui layanan internet yang cepat
                                    dan stabil.</p>
                            </div>
                        </div>
                    </div> <!-- END FEATURE BOX #4 -->
                </div> <!-- End row -->
            </div> <!-- END FEATURES-7 WRAPPER -->
        </div> <!-- End container -->
    </section>

    <section id="banner-3" class="py-100 banner-section">
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

    <!-- FAQs-2                                                                                                                                        ============================================= -->
    <section id="faqs-2" class=" pb-30 inner-page-hero faqs-section division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">
                    <!-- INNER PAGE TITLE -->
                    <div class="inner-page-title">
                        <h2 class="s-46 w-700">Pertanyaan & Jawaban</h2>
                        <p class="p-lg">Temukan jawaban untuk pertanyaan-pertanyaan terkait internet Dedicated.</p>
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
