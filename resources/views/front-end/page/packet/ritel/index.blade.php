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
    </style>
@endpush

@section('content')
    <!-- HERO-2                                                                                                             ============================================= -->
    <section id="hero-2" class="bg--08 hero-section">
        <div class="container">
            <div class="row d-flex align-items-center">
                <!-- HERO TEXT -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="hero-2-txt wow fadeInLeft">

                        <!-- Title -->
                        <h2 class="s-56 w-700 color--black">Broadband Internet</h2>

                        <!-- Text -->
                        <p class="p-lg">Nikmati pengalaman internet tanpa batas dengan kecepatan tinggi dan koneksi yang
                            stabil. Dengan IDNET, Anda mendapatkan lebih dari sekadar koneksi internet.
                        </p>
                        <!-- HERO DIGITS -->
                        <p class="p-lg">Mulai Dari <span class=" s-22 w-500 color--black">Rp. 100.000</span> /Bulan</p>
                        {{-- <div class="hero-digits clearfix">
                        </div> --}}
                    </div> <!-- END HERO TEXT -->


                </div> <!-- End row -->
                <!-- HERO IMAGE -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="hero-2-img wow fadeInRight">
                        <img class="img-fluid" src="{{ asset('front-end/images/Group 832.png') }}" alt="hero-image">
                    </div>
                </div>
            </div> <!-- End container -->
    </section> <!-- END HERO-2 -->




    <!-- PRICING-1
                                                                                                                                                   ============================================= -->
    <section id="pricing-1" class="gr--whitesmoke pb-40 inner-page-hero pricing-section">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-40 w-700">Daftar Harga Paket Broadband</h2>
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
                                                            <li
                                                                class="d-flex align-items-center justify-content-start gap-2">
                                                                <img src="{{ url('storage/images/descrip/' . $des->logo) }}"
                                                                    alt="" height="20"> {{ $des->name }}
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
    </section> <!-- END PRICING-1 -->




    <!-- DIVIDER LINE -->
    <hr class="divider">




    <!-- PRICING COMPARE
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
                            <p class="p-lg">Punya Pertanyaan Lainnya? <a href="contacts.html"
                                    class="color--theme">Hubungi Kami</a></p>
                        </div>
                    </div>


                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END FAQs-2 -->




    <!-- BANNER-1
                                                                                                                                                       ============================================= -->
    <section id="banner-1" class="pt-100 banner-section">
        <div class="container">


            <!-- BANNER-1 WRAPPER -->
            <div class="banner-1-wrapper r-16">
                <div class="banner-overlay bg--05 bg--fixed">
                    <div class="row">


                        <!-- BANNER-1 TEXT -->
                        <div class="col">
                            <div class="banner-1-txt color--white">

                                <!-- Title -->
                                <h2 class="s-45 w-700">Give it a try, it's free!</h2>

                                <!-- Text -->
                                <p class="p-xl">It only takes a few clicks to get started</p>

                                <!-- Button -->
                                <a href="signup-1.html" class="btn r-04 btn--theme hover--tra-white">Get srarted - it's
                                    free
                                </a>

                                <!-- Button Text -->
                                <p class="p-sm btn-txt ico-15 o-85">
                                    <span class="flaticon-check"></span> Free for 14 days, no credit card required.
                                </p>

                            </div>
                        </div> <!-- END BANNER-1 TEXT -->


                    </div> <!-- End row -->
                </div> <!-- End banner overlay -->
            </div> <!-- END BANNER-1 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END BANNER-1 -->
@endsection
