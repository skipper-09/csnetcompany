<script src="{{ asset('front-end/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('front-end/js/bootstrap.min.js') }}"></script>	
<script src="{{ asset('front-end/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.easing.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.appear.js') }}"></script>
<script src="{{ asset('front-end/js/menu.js') }}"></script>
<script src="{{ asset('front-end/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front-end/js/pricing-toggle.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front-end/js/request-form.js') }}"></script>	
<script src="{{ asset('front-end/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.ajaxchimp.min.js') }}"></script>	
<script src="{{ asset('front-end/js/popper.min.js') }}"></script>
<script src="{{ asset('front-end/js/lunar.js') }}"></script>
<script src="{{ asset('front-end/js/wow.js') }}"></script>
        
<!-- Custom Script -->		
<script src="{{ asset('front-end/js/custom.js') }}"></script>


<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->															
<!--
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
-->	
@stack('js')