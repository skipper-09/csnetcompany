@if (!isset($navlight))
    <header id="header" class="white-menu light-hero-header navbar-dark white-scroll">
        <div class="header-wrapper">


            <!-- MOBILE HEADER -->
            <div class="wsmobileheader clearfix">
                <span class="smllogo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('front-end/images/logoo-csnet.webp') }}" alt="mobile-logo">
                    </a>
                </span>
                <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
            </div>


            <!-- NAVIGATION MENU -->
            <div class="wsmainfull menu clearfix">
                <div class="wsmainwp clearfix">


                    <!-- HEADER BLACK LOGO -->
                    <div class="desktoplogo">
                        <a href="{{ route('home') }}" class="logo-black"><img
                                src="{{ asset('front-end/images/logoo-csnet.webp') }}" alt="logo"></a>
                    </div>


                    <!-- HEADER WHITE LOGO -->
                    <div class="desktoplogo">
                        <a href="{{ route('home') }}" class="logo-white"><img
                                src="{{ asset('front-end/images/logoo-csnet.webp') }}" alt="logo"></a>
                    </div>


                    <!-- MAIN MENU -->
                    <nav class="wsmenu clearfix">
                        <ul class="wsmenu-list nav-theme">
                            <!-- SIMPLE NAVIGATION LINK -->
                            <li class="nl-simple" aria-haspopup="true"><a href="{{ route('home') }}"
                                    class="h-link active">Home</a></li>
                            <!-- DROPDOWN SUB MENU -->
                            <li aria-haspopup="true"><a href="#" class="h-link">Produk<span
                                        class="wsarrow"></span></a>
                                <ul class="sub-menu">
                                    <li aria-haspopup="true"><a href="{{ route('packet.ritel') }}">Broadband</a></li>
                                    <li aria-haspopup="true"><a href="{{ route('packet.dedicated') }}">Dedicated</a>
                                    </li>
                                    <li aria-haspopup="true"><a href="{{ route('packet.internettv') }}">Internet +
                                            TV</a>
                                    </li>
                                    <li aria-haspopup="true"><a href="https://cloudpedia.id/">Hosting</a></li>
                                    <li aria-haspopup="true"><a href="{{ route('packet.promo') }}">Promo</a></li>
                                </ul>
                            </li>
                            {{-- <li class="nl-simple" aria-haspopup="true"><a href="{{ route('blog') }}"
                                    class="h-link">Blog</a>
                            </li> --}}

                            <li aria-haspopup="true"><a href="#" class="h-link">Bantuan<span
                                        class="wsarrow"></span></a>
                                <ul class="sub-menu">
                                    {{-- <li aria-haspopup="true"><a href="{{ route('career') }}">Career</a></li> --}}
                                    <li aria-haspopup="true"><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                                    <li aria-haspopup="true"><a href="{{ route('help.faq') }}">FAQ</a></li>
                                </ul>
                            </li>

                            <!-- MEGAMENU -->



                            <!-- SIMPLE NAVIGATION LINK -->
                            <li class="nl-simple" aria-haspopup="true"><a href="{{ route('cekarea') }}"
                                    class="h-link">Cek Area</a>
                            </li>
                            <li class="nl-simple" aria-haspopup="true"><a href="{{ route('karir') }}"
                                    class="h-link">Karir</a>
                            </li>
                            <li class="nl-simple" aria-haspopup="true">
                                <a href="{{ route('mitra.landing') }}"
                                    class="h-link {{ request()->routeIs('mitra.*') ? 'active' : '' }}">Program
                                    Mitra</a>
                            </li>
                            <!-- SIMPLE NAVIGATION LINK -->
                            {{-- <li class="nl-simple" aria-haspopup="true"><a href="#" class="h-link">FAQs</a></li> --}}
                            <!-- BAYAR TAGIHAN -->
                            {{-- <li class="nl-simple nav-cta-item" aria-haspopup="true">
                                <a href="https://client.csnet.id/" class="nav-cta nav-cta--outline">
                                    <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                        <path d="M3 10h18"></path>
                                    </svg> Bayar Tagihan
                                </a>
                            </li> --}}
                            <!-- DAFTAR SEKARANG -->
                            <li class="nav-cta-item mobile-last-link" aria-haspopup="true">
                                <a href="#" class="nav-cta nav-cta--red">Daftar Sekarang</a>
                                <ul class="sub-menu">
                                    <li aria-haspopup="true"><a href="{{ route('preregister') }}">Retail / Rumah</a>
                                    </li>
                                    <li aria-haspopup="true"><a href="{{ route('preregister_bisnis') }}">Bisnis</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- SIGN UP BUTTON -->
                            {{-- <li class="nl-simple" aria-haspopup="true">
                            <a href="signup-2.html" class="btn r-04 btn--theme hover--tra-black last-link">Sign up</a>
                        </li> --}}


                        </ul>
                    </nav> <!-- END MAIN MENU -->


                </div>
            </div> <!-- END NAVIGATION MENU -->


        </div> <!-- End header-wrapper -->
    </header>
@elseif (isset($navlight) && $navlight == true)
    <header id="header" class="tra-menu navbar-light white-scroll">
        <div class="header-wrapper">


            <!-- MOBILE HEADER -->
            <div class="wsmobileheader clearfix">
                <span class="smllogo">
                    <a href="{{ route('home') }}"><img src="{{ asset('front-end/images/logoo-csnet.webp') }}"
                            alt="mobile-logo"></a>
                </span>
                <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
            </div>


            <!-- NAVIGATION MENU -->
            <div class="wsmainfull menu clearfix">
                <div class="wsmainwp clearfix">


                    <!-- HEADER BLACK LOGO -->
                    <div class="desktoplogo">
                        <a href="{{ route('home') }}" class="logo-black"><img
                                src="{{ asset('front-end/images/logoo-csnet.webp') }}" alt="logo"></a>
                    </div>


                    <!-- HEADER WHITE LOGO -->
                    <div class="desktoplogo">
                        <a href="{{ route('home') }}" class="logo-white"><img
                                src="{{ asset('front-end/images/logoo-csnet.webp') }}" alt="logo"></a>
                    </div>


                    <!-- MAIN MENU -->
                    <nav class="wsmenu clearfix">
                        <ul class="wsmenu-list nav-theme">
                            <!-- SIMPLE NAVIGATION LINK -->
                            <li class="nl-simple" aria-haspopup="true"><a href="{{ route('home') }}"
                                    class="h-link active">Home</a></li>
                            <!-- DROPDOWN SUB MENU -->
                            <li aria-haspopup="true"><a href="#" class="h-link">Produk<span
                                        class="wsarrow"></span></a>
                                <ul class="sub-menu">
                                    <li aria-haspopup="true"><a href="{{ route('packet.ritel') }}">Broadband</a></li>
                                    <li aria-haspopup="true"><a href="{{ route('packet.dedicated') }}">Dedicated</a>
                                    </li>
                                    <li aria-haspopup="true"><a href="{{ route('packet.internettv') }}">Internet +
                                            TV</a>
                                    </li>
                                    <li aria-haspopup="true"><a href="https://cloudpedia.id/">Hosting</a></li>
                                    <li aria-haspopup="true"><a href="{{ route('packet.promo') }}">Promo</a></li>
                                </ul>
                            </li>
                            {{-- <li class="nl-simple" aria-haspopup="true"><a href="{{ route('blog') }}"
                                    class="h-link">Blog</a>
                            </li> --}}

                            <li aria-haspopup="true"><a href="#" class="h-link">Bantuan<span
                                        class="wsarrow"></span></a>
                                <ul class="sub-menu">
                                    {{-- <li aria-haspopup="true"><a href="{{ route('career') }}">Career</a></li> --}}
                                    <li aria-haspopup="true"><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                                    <li aria-haspopup="true"><a href="{{ route('help.faq') }}">FAQ</a></li>
                                </ul>
                            </li>
                            {{--
                        <!-- MEGAMENU -->
                        <li aria-haspopup="true" class="mg_link"><a href="#" class="h-link">Pages <span
                                    class="wsarrow"></span></a>
                            <div class="wsmegamenu w-75 clearfix">
                                <div class="container">
                                    <div class="row">

                                        <!-- MEGAMENU LINKS -->
                                        <ul class="col-md-12 col-lg-3 link-list">
                                            <li class="fst-li"><a href="about.html">About Us</a></li>
                                            <li><a href="team.html">Our Team</a></li>
                                            <li><a href="careers.html">Careers <span class="sm-info">4</span></a></li>
                                            <li><a href="career-role.html">Career Details</a></li>
                                            <li><a href="contacts.html">Contact Us</a></li>
                                        </ul>

                                        <!-- MEGAMENU LINKS -->
                                        <ul class="col-md-12 col-lg-3 link-list">
                                            <li><a href="features.html">Core Features</a></li>
                                            <li class="fst-li"><a href="projects.html">Our Projects</a></li>
                                            <li><a href="project-details.html">Project Details</a></li>
                                            <li><a href="reviews.html">Testimonials</a></li>
                                            <li><a href="download.html">Download Page</a></li>
                                        </ul>

                                        <!-- MEGAMENU LINKS -->
                                        <ul class="col-md-12 col-lg-3 link-list">
                                            <li class="fst-li"><a href="pricing-1.html">Pricing Page #1</a></li>
                                            <li><a href="pricing-1.html">Pricing Page #2</a></li>
                                            <li><a href="faqs.html">FAQs Page</a></li>
                                            <li><a href="help-center.html">Help Center</a></li>
                                            <li><a href="404.html">404 Page</a></li>
                                        </ul>

                                        <!-- MEGAMENU LINKS -->
                                        <ul class="col-md-12 col-lg-3 link-list">
                                            <li class="fst-li"><a href="blog-listing.html">Blog Listing</a></li>
                                            <li><a href="single-post.html">Single Blog Post</a></li>
                                            <li><a href="login-2.html">Login Page</a></li>
                                            <li><a href="signup-2.html">Signup Page</a></li>
                                            <li><a href="reset-password.html">Reset Password</a></li>
                                        </ul>

                                    </div> <!-- End row -->
                                </div> <!-- End container -->
                            </div> <!-- End wsmegamenu -->
                        </li> <!-- END MEGAMENU --> --}}


                            <!-- SIMPLE NAVIGATION LINK -->
                            <li class="nl-simple" aria-haspopup="true"><a href="{{ route('cekarea') }}"
                                    class="h-link">Cek Area</a>
                            </li>
                            <li class="nl-simple" aria-haspopup="true"><a href="{{ route('karir') }}"
                                    class="h-link">Karir</a>
                            </li>
                            <li class="nl-simple" aria-haspopup="true">
                                <a href="{{ route('mitra.landing') }}"
                                    class="h-link {{ request()->routeIs('mitra.*') ? 'active' : '' }}">Program
                                    Mitra</a>
                            </li>
                            {{-- <li class="nl-simple" aria-haspopup="true"><a href="{{ route('preregister') }}"
                                    class="h-link">Pre Register</a>
                            </li> --}}
                            <!-- SIMPLE NAVIGATION LINK -->
                            {{-- <li class="nl-simple" aria-haspopup="true"><a href="#" class="h-link">FAQs</a></li> --}}
                            <!-- BAYAR TAGIHAN -->
                            {{-- <li class="nl-simple nav-cta-item" aria-haspopup="true">
                                <a href="https://client.csnet.id/" class="nav-cta nav-cta--outline">
                                    <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                        <path d="M3 10h18"></path>
                                    </svg> Bayar Tagihan
                                </a>
                            </li> --}}
                            <!-- DAFTAR SEKARANG -->
                            <li class="nav-cta-item mobile-last-link" aria-haspopup="true">
                                <a href="#" class="nav-cta nav-cta--red">Daftar Sekarang</a>
                                <ul class="sub-menu">
                                    <li aria-haspopup="true"><a href="{{ route('preregister') }}">Retail / Rumah</a>
                                    </li>
                                    <li aria-haspopup="true"><a href="{{ route('preregister_bisnis') }}">Bisnis</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- SIGN UP BUTTON -->
                            {{-- <li class="nl-simple" aria-haspopup="true">
                            <a href="signup-2.html" class="btn r-04 btn--theme hover--tra-black last-link">Sign up</a>
                        </li> --}}


                        </ul>
                    </nav> <!-- END MAIN MENU -->


                </div>
            </div> <!-- END NAVIGATION MENU -->


        </div> <!-- End header-wrapper -->
    </header>
@endif
