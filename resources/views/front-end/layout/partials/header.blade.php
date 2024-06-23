<header id="header" class="white-menu light-hero-header navbar-dark white-scroll">
    <div class="header-wrapper">


        <!-- MOBILE HEADER -->
        <div class="wsmobileheader clearfix">
            <span class="smllogo"><img src="{{ asset('front-end/images/logo-idnet.webp') }}" alt="mobile-logo"></span>
            <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
        </div>


        <!-- NAVIGATION MENU -->
        <div class="wsmainfull menu clearfix">
            <div class="wsmainwp clearfix">


                <!-- HEADER BLACK LOGO -->
                <div class="desktoplogo">
                    <a href="{{ route('home') }}" class="logo-black"><img
                            src="{{ asset('front-end/images/logo-idnet.webp') }}" alt="logo"></a>
                </div>


                <!-- HEADER WHITE LOGO -->
                <div class="desktoplogo">
                    <a href="{{ route('home') }}" class="logo-white"><img
                            src="{{ asset('front-end/images/logo-idnet.webp') }}" alt="logo"></a>
                </div>


                <!-- MAIN MENU -->
                <nav class="wsmenu clearfix">
                    <ul class="wsmenu-list nav-theme">
                        <!-- SIMPLE NAVIGATION LINK -->
                        <li class="nl-simple" aria-haspopup="true"><a href="{{ route('home') }}"
                                class="h-link active">Home</a></li>
                        <!-- DROPDOWN SUB MENU -->
                        <li aria-haspopup="true"><a href="#" class="h-link">Produk<span class="wsarrow"></span></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true"><a href="{{ route('packet.ritel') }}">Broadband</a></li>
                                <li aria-haspopup="true"><a href="{{ route('packet.dedicated') }}">Dedicated</a></li>
                                <li aria-haspopup="true"><a href="{{ route('packet.internettv') }}">Internet + TV</a>
                                </li>
                                <li aria-haspopup="true"><a href="https://portal.cloudpedia.id/">Hosting</a></li>
                                <li aria-haspopup="true"><a href="#lnk-3">Promo</a></li>
                            </ul>
                        </li>
                        <li class="nl-simple" aria-haspopup="true"><a href="{{ route('blog') }}" class="h-link">Blog</a>
                        </li>

                        <li aria-haspopup="true"><a href="#" class="h-link">Bantuan<span class="wsarrow"></span></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true"><a href="#lnk-1">Tips & Tutorial</a></li>
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
                        <li class="nl-simple" aria-haspopup="true"><a href="{{ route('contact') }}"
                                class="h-link">Hubungi Kami</a></li>
                        <!-- SIMPLE NAVIGATION LINK -->
                        {{-- <li class="nl-simple" aria-haspopup="true"><a href="#" class="h-link">FAQs</a></li> --}}
                        <!-- SIGN IN LINK -->
                        <li class="nl-simple reg-fst-link mobile-last-link" aria-haspopup="true">
                            <a href="https://client.idnet.id/"
                                class="btn r-04 btn--theme hover--theme last-link">Billing</a>
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