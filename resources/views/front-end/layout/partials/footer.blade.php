

<footer id="footer-3" class="pt-100 footer">
    <div class="container">


        <!-- FOOTER CONTENT -->
        <div class="row">


            <!-- FOOTER LOGO -->
            <div class="col-xl-3">
                <div class="footer-info">
                    <img class="footer-logo" src="{{ asset('front-end/images/logo-white-idnet.png') }}" alt="footer-logo">
                </div>
                <!-- Social Links -->
                <!-- Title -->
                <h6 class="s-17 w-700 text-white">Sosial Media</h6>
                <ul class="footer-socials ico-25 text-center clearfix">
                    <li><a href="#"><span class="flaticon-facebook text-white"></span></a></li>
                    <li><a href="#"><span class="flaticon-twitter text-white"></span></a></li>
                    <li><a href="https://www.instagram.com/idnet.official"><span
                                class="flaticon-instagram text-white "></span></a>
                    </li>
                    <li><a href="#"><span class="flaticon-linkedin-logo text-white"></span></a></li>
                </ul>
            </div>


            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-md-3 col-xl-2">
                <div class="footer-links fl-1">

                    <!-- Title -->
                    <h6 class="s-17 w-700 text-white">Paket & Harga</h6>

                    <!-- Links -->
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="about.html">Broadband</a></p>
                        </li>
                        <li>
                            <p><a href="careers.html">Dedicated</a></p>
                        </li>
                        <li>
                            <p><a href="blog-listing.html">Internet + TV</a></p>
                        </li>
                    </ul>

                </div>
            </div> <!-- END FOOTER LINKS -->


            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-md-3 col-xl-2">
                <div class="footer-links fl-2">

                    <!-- Title -->
                    <h6 class="s-17 w-700 text-white">Pelanggan</h6>

                    <!-- Links -->
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="">Daftar</a></p>
                        </li>
                        <li>
                            <p><a href="">Billing</a></p>
                        </li>
                        <li>
                            <p><a href="">Hubungi Kami</a></p>
                        </li>
                    </ul>

                </div>
            </div> <!-- END FOOTER LINKS -->


            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-md-3 col-xl-2">
                <div class="footer-links fl-3">

                    <!-- Title -->
                    <h6 class="s-17 w-700 text-white">informasi</h6>

                    <!-- Links -->
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="terms.html">Terms of Use</a></p>
                        </li>
                        <li>
                            <p><a href="privacy.html">Privacy Policy</a></p>
                        </li>
                        <li>
                            <p><a href="cookies.html">Cookie Policy</a></p>
                        </li>
                        <li>
                            <p><a href="#">Site Map</a></p>
                        </li>
                    </ul>

                </div>
            </div> <!-- END FOOTER LINKS -->


            <!-- FOOTER LINKS -->
            <div class="col-sm-6 col-md-3">
                <div class="footer-links fl-4">

                    <!-- Title -->
                    <h6 class="s-17 w-700 text-white">Hubungi Kami</h6>
                    <p class="s-15">
                        Untuk informasi lebih lanjut mengenai ID Net silakan hubungi kami di:
                    </p>
                    <!-- Mail Link -->
                    <p class="footer-mail-link ico-25">
                    <div class="d-flex ico-25 align-content-center align-items-center  gap-1">
                        <span class="flaticon-email"></span>
                        <a href="mailto:yourdomain@mail.com">
                            <p class="s-15 text-white">hello@yourdomain.com</p>
                        </a>
                    </div>
                    <div class="d-flex ico-25 align-content-center align-items-center  gap-1">
                        <span class="flaticon-whatsapp text-white"></span>
                        <a href="">
                            <p class="s-15 text-white">6282116879977</p>
                        </a>
                    </div>
                    <div class="d-flex ico-25 align-content-center  gap-1">
                        <span class="flaticon-map"></span>
                        <p class="s-15">Ruko Gajah Mada Square, Jl. Gajah Mada.187 Blok A 21, Kaliwates Kidul,
                            Kaliwates, Kec. Kaliwates, Kabupaten Jember, Jawa Timur 68121 </p>
                    </div>
                    </p>



                </div>
            </div> <!-- END FOOTER LINKS -->


        </div> <!-- END FOOTER CONTENT -->


        <hr> <!-- FOOTER DIVIDER LINE -->


        <!-- BOTTOM FOOTER -->
        <div class="bottom-footer">
            <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">


                <!-- FOOTER COPYRIGHT -->
                <div class="col">
                    <div class="footer-copyright">
                        <p class="p-sm">&copy; <span id="year"></span> IDNET All Rights Reserved</p>
                    </div>
                </div>


                {{--
                <!-- FOOTER SECONDARY LINK -->
                <div class="col">
                    <div class="bottom-secondary-link ico-15 text-end">
                        <p class="p-sm"><a href="https://www.ahmadnurulmusthopa.my.id/">Made with
                                <span class="flaticon-heart"></span> by @skipper-09</a>
                        </p>
                    </div>
                </div> --}}


            </div> <!-- End row -->
        </div> <!-- END BOTTOM FOOTER -->

        {{-- floating button whatsapp --}}
        <a href="https://wa.me/6282116879977?text=Halo" class="floating" target="_blank">
            <i class="fab fa-whatsapp fab-icon"></i>
        </a>

    </div> <!-- End container -->
</footer>


@push('js')
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
@endpush
