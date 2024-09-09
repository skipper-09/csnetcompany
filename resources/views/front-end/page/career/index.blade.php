@extends('front-end.layout.base')

@section('title', $page_name)

@section('content')
    <!-- PAGE HERO SECTION
                                                                                                       ============================================= -->
    <section class="page-hero-section">
        <div class="page-hero-section-overlay bg--01 bg--scroll">
            <div class="container">
                <div class="row d-flex align-items-center">


                    <!-- TEXT BLOCK -->
                    <div class="col-md-6">
                        <div class="txt-block left-column color--white wow fadeInRight">

                            <!-- Section ID -->
                            <span class="section-id rounded-id bg--tra-white color--white">
                                Careers
                            </span>

                            <!-- Title -->
                            <h2 class="s-56 w-700">Bergabunglah Bersama Team Kami</h2>

                            <!-- Text -->
                            <p class="p-lg w-400">Apakah Anda siap untuk tumbuh bersama perusahaan yang dinamis dan inovatif?
                                Kami mencari individu
                                berbakat yang penuh semangat dan berdedikasi untuk mencapai kesuksesan bersama. Di sini,
                                kami
                                percaya bahwa karyawan adalah aset terbesar kami, dan kami berkomitmen untuk menciptakan
                                lingkungan kerja yang mendukung pengembangan karier, kreativitas, dan kolaborasi.
                            </p>

                        </div>
                    </div> <!-- END TEXT BLOCK -->


                    <!-- IMAGE BLOCK -->
                    <div class="col-md-6">
                        <div class="img-block right-column wow fadeInLeft">
                            <img class="img-fluid" src="{{ asset('front-end/images/img-18.png') }}" alt="content-image">
                        </div>
                    </div>


                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- End Page Hero Section Overlay -->


        <!-- WAVE SHAPE BOTTOM -->
        <div class="wave-shape-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 170">
                <path fill-opacity="1"
                    d="M0,160L120,160C240,160,480,160,720,138.7C960,117,1200,75,1320,53.3L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
                </path>
            </svg>
        </div>


    </section> <!-- END PAGE HERO SECTION -->




    <!-- ABOUT-3
                                                                                                       ============================================= -->
    <div id="about-3" class="pt-100 about-section division">
        <div class="container">
            <div class="row">


                <!-- ABOUT-3 TEXT -->
                <div class="col-md-6">
                    <div id="a3-1" class="txt-block">

                        <!-- Title -->
                        <h5 class="s-24 w-700 mb-20">Bergabunglah dengan Tim Kami</h5>

                        <!-- Text -->
                        <p>Apakah Anda siap untuk tumbuh bersama perusahaan yang dinamis dan inovatif? Kami mencari individu
                            berbakat yang penuh semangat dan berdedikasi untuk mencapai kesuksesan bersama. Di sini, kami
                            percaya bahwa karyawan adalah aset terbesar kami, dan kami berkomitmen untuk menciptakan
                            lingkungan kerja yang mendukung pengembangan karier, kreativitas, dan kolaborasi.
                        </p>

                        <!-- List -->
                        <ul class="simple-list">

                            <li class="list-item">
                                <p>Tempor sapien quaerat an ipsum laoreet purus and sapien dolor an ultrice ipsum
                                    aliquam undo congue dolor cursus
                                </p>
                            </li>

                            <li class="list-item">
                                <p class="mb-0">Cursus purus suscipit vitae cubilia magnis volute egestas vitae
                                    sapien turpis ultrice auctor congue magna placerat
                                </p>
                            </li>

                        </ul>

                    </div>
                </div> <!-- END ABOUT-3 TEXT -->


                <!-- ABOUT-3 TEXT -->
                <div class="col-md-6">
                    <div id="a3-2" class="txt-block">

                        <!-- Title -->
                        <h5 class="s-24 w-700 mb-20">We deliver results</h5>

                        <!-- Text -->
                        <p>Nemo ipsam egestas volute turpis egestas ipsum and purus sapien ultrice an aliquam quaerat
                            ipsum augue turpis sapien cursus congue magna purus quaerat at ligula purus egestas magna
                            cursus undo varius purus magnis sapien quaerat
                        </p>

                        <!-- Text -->
                        <p class="mb-0">Egestas volute nemo ipsam turpis egestas ipsum and purus sapien ultrice an
                            aliquam quaerat ipsum augue turpis sapien cursus congue magna purus quaerat at ligula purus
                            egestas magna cursus undo varius purus quaerat sapien magnis
                        </p>

                    </div>
                </div> <!-- END ABOUT-3 TEXT -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END ABOUT-3 -->




    <!-- ABOUT-2
                                                                                                       ============================================= -->
    <div id="about-2" class="rel pt-100 about-section division">


        <!-- ABOUT-2 IMAGES -->
        <div class="container-fluid">
            <div class="row">


                <!-- IMAGES-1 -->
                <div class="col-md-5">
                    <div class="text-end">


                        <!-- IMAGE-1 -->
                        <div class="about-2-img a-2-1 r-12">
                            <img class="img-fluid" src="{{ asset('front-end/images/a2-1.jpg') }}" alt="about-image">
                        </div>


                        <!-- IMAGE-2 -->
                        <div class="about-2-img a-2-2 r-12">
                            <img class="img-fluid" src="{{ asset('front-end/images/a2-2.jpg') }}" alt="about-image">
                        </div>


                    </div>
                </div> <!-- END IMAGES-1 -->


                <!-- IMAGES-2 -->
                <div class="col-md-7">


                    <!-- IMAGE-3 -->
                    <div class="about-2-img a-2-3 r-12">
                        <img class="img-fluid" src="{{ asset('front-end/images/a2-3.jpg') }}" alt="about-image">
                    </div>


                    <div class="row">

                        <!-- TEXT -->
                        <div class="col-md-7 col-lg-6">
                            <div class="a2-txt bg--black-400 pattern-01 bg--fixed color--white r-12">

                                <!-- Icon -->
                                <div class="a2-txt-quote ico-40 o-20">
                                    <span class="flaticon-quote"></span>
                                </div>

                                <!-- Text -->
                                <p>Karier bukan hanya tentang bekerja, tetapi tentang berkembang. Mari tumbuh bersama!
                                </p>

                                {{-- <!-- Author -->
                                <p class="a2-txt-author">Charlie Cheever <span>CEO & CO-FOUNDER</span></p> --}}

                            </div>
                        </div>

                        <!-- IMAGE-4 -->
                        <div class="col-md-5 col-lg-6">
                            <div class="about-2-img a-2-4 r-12">
                                <img class="img-fluid" src="{{ asset('front-end/images/a2-4.jpg') }}" alt="about-image">
                            </div>
                        </div>

                    </div> <!-- End row -->


                </div> <!-- END IMAGES-2 -->


            </div> <!-- End row -->
        </div> <!-- END ABOUT-2 IMAGES -->


    </div> <!-- END ABOUT-2 -->





    <!-- CAREERS-1 -->
    <section id="careers-1" class="pt-100 pb-60 careers-section">
        <div class="container">

            @if (count($job) > 0)
                <!-- SECTION TITLE -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9">
                        <div class="section-title mb-70">

                            <!-- Title -->
                            <h2 class="s-52 w-700">We Are Hiring</h2>

                            {{-- <!-- Text -->
                        <p class="p-lg">
                        </p> --}}

                        </div>
                    </div>
                </div>


                <!-- OPEN ROLES -->
                <div class="row row-cols-1 row-cols-md-2">

                    @foreach ($job as $item)
                        <!-- OPEN ROLE #1 -->
                        <div class="col">
                            <div class="role-box bg--white-300 r-10">
                                <a href="career-role.html">
                                    <span>{{ $item->categoryjob->name }}</span>
                                    <h6 class="s-20 w-700">{{ $item->name }}</h6>
                                    <p>{{ $item->joblocation->name }}</p>
                                </a>
                            </div>
                        </div> <!-- END OPEN ROLE #1 -->
                    @endforeach


                </div> <!-- END OPEN ROLES -->
            @else
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9">
                        <div class="section-title mb-70">

                            <!-- Title -->
                            <h2 class="s-30 w-700">Belum Ada Lowongan Kerja</h2>

                            {{-- <!-- Text -->
                        <p class="p-lg">
                        </p> --}}

                        </div>
                    </div>
                </div>
            @endif





        </div> <!-- End container -->
    </section> <!-- END CAREERS-1 -->
@endsection
