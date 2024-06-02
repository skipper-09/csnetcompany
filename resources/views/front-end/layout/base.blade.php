<!doctype html>
<!-- Martex - Software, App, SaaS & Startup Landing Pages Pack design by DSAThemes (http://www.dsathemes.com) -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">




<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DSAThemes">
    <meta name="description" content="Martex - Software, App, SaaS & Startup Landing Pages Pack">
    <meta name="keywords"
        content="Responsive, HTML5, DSAThemes, Landing, Software, Mobile App, SaaS, Startup, Creative, Digital Product">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SITE TITLE -->
    <title>Martex - Software, App, SaaS & Startup Landing Pages Pack</title>

    <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="icon" href="images/apple-touch-icon.png" type="image/x-icon">

    {{-- css style include --}}
    @include('front-end.layout.partials.css')

</head>




<body>




    <!-- PRELOADER SPINNER
  ============================================= -->
    <div id="loading" class="loading--theme">
        <div id="loading-center"><span class="loader"></span></div>
    </div>




    <!-- PAGE CONTENT
  ============================================= -->
    <div id="page" class="page font--jakarta">




        <!-- HEADER
   ============================================= -->
        @include('front-end.layout.partials.header')
        <!-- END HEADER -->
        @yield('content')


        {{-- <!-- MODAL WINDOW (NEWSLETTER FORM)
   ============================================= -->
        <div id="modal-2" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">


                    <!-- CLOSE BUTTON -->
                    <button type="button" class="btn-close ico-10 white-color" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="flaticon-cancel"></span>
                    </button>


                    <!-- MODAL CONTENT -->
                    <div class="modal-body text-center">


                        <!-- IMAGE -->
                        <div class="modal-body-img">
                            <img class="img-fluid" src="images/modal-newsletter-violet.jpg" alt="content-image">
                        </div>


                        <!-- NEWSLETTER FORM -->
                        <div class="modal-body-content">

                            <!-- Title -->
                            <h5 class="s-24 w-700">Stay up to date with our news, ideas and updates</h5>

                            <!-- Form -->
                            <form class="newsletter-form">

                                <div class="input-group">
                                    <input type="email" autocomplete="off" class="form-control"
                                        placeholder="Your email address" required id="s-email">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn--theme hover--theme">Subscribe
                                            Now</button>
                                    </span>
                                </div>

                                <!-- Newsletter Form Notification -->
                                <label for="s-email" class="form-notification"></label>

                            </form>

                        </div> <!-- END NEWSLETTER FORM -->


                    </div> <!-- END MODAL CONTENT -->


                </div>
            </div>
        </div> <!-- END MODAL WINDOW (NEWSLETTER FORM) -->




        <!-- MODAL WINDOW (REQUEST FORM)
   ============================================= -->
        <div id="modal-3" class="modal auto-off fade" tabindex="-1" role="dialog" aria-labelledby="modal-3">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">


                    <!-- CLOSE BUTTON -->
                    <button type="button" class="btn-close ico-10 white-color" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="flaticon-cancel"></span>
                    </button>


                    <!-- MODAL CONTENT -->
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">


                                <!-- BACKGROUND IMAGE -->
                                <div class="col-md-5 bg-img d-none d-sm-flex align-items-end"></div>


                                <!-- REQUEST FORM -->
                                <div class="col-md-7">
                                    <div class="modal-body-content">

                                        <!-- TEXT -->
                                        <div class="request-form-title">

                                            <!-- Title 	-->
                                            <h3 class="s-28 w-700">Get started for Free!</h3>

                                            <!-- Text -->
                                            <p class="color--grey">Aliquam augue suscipit, luctus neque purus ipsum
                                                neque dolor primis libero
                                            </p>

                                        </div>

                                        <!-- FORM -->
                                        <form name="requestForm" class="row request-form">

                                            <!-- Form Input -->
                                            <div class="col-md-12">
                                                <input type="text" name="name" class="form-control name"
                                                    placeholder="Enter Your Name*" autocomplete="off" required>
                                            </div>

                                            <!-- Form Input -->
                                            <div class="col-md-12">
                                                <input type="email" name="email" class="form-control email"
                                                    placeholder="Enter Your Email*" autocomplete="off" required>
                                            </div>

                                            <!-- Form Button -->
                                            <div class="col-md-12 form-btn">
                                                <button type="submit"
                                                    class="btn btn--theme hover--tra-black submit">Get Started
                                                    Now</button>
                                            </div>

                                            <!-- Form Message -->
                                            <div class="col-md-12 request-form-msg">
                                                <span class="loading"></span>
                                            </div>

                                        </form> <!-- END FORM -->

                                    </div>
                                </div> <!-- END REQUEST FORM -->


                            </div>
                        </div>
                    </div> <!-- END MODAL CONTENT -->


                </div>
            </div>
        </div> <!-- END MODAL WINDOW (REQUEST FORM) --> --}}




        <!-- FOOTER-3
   ============================================= -->
        @include('front-end.layout.partials.footer')
        <!-- END FOOTER-3 -->




    </div> <!-- END PAGE CONTENT -->




    <!-- EXTERNAL SCRIPTS
  ============================================= -->
    @include('front-end.layout.partials.js')
    {{-- END EXTERNAL SCRIPTS --}}

</body>




</html>
