<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap"
  rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">

<!-- BOOTSTRAP CSS -->
<link href="{{ asset('front-end/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- FONT ICONS -->
<link href="{{ asset('front-end/css/flaticon.css') }}" rel="stylesheet">

<!-- PLUGINS STYLESHEET -->
<link href="{{ asset('front-end/css/menu.css') }}" rel="stylesheet">
<link id="effect" href="{{ asset('front-end/css/dropdown-effects/fade-down.css') }}" media="all" rel="stylesheet">
<link href="{{ asset('front-end/css/magnific-popup.css') }}" rel="stylesheet">
<link href="{{ asset('front-end/css/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('front-end/css/owl.theme.default.min.css') }}" rel="stylesheet">
<link href="{{ asset('front-end/css/lunar.css') }}" rel="stylesheet">

<!-- ON SCROLL ANIMATION -->
<link href="{{ asset('front-end/css/animate.css') }}" rel="stylesheet">

<!-- TEMPLATE CSS -->
<link href="{{ asset('front-end/css/blue-theme.css') }}" rel="stylesheet">
<!-- <link href="css/crocus-theme.css" rel="stylesheet"> -->
<!-- <link href="css/green-theme.css" rel="stylesheet"> -->
<!-- <link href="css/magenta-theme.css" rel="stylesheet"> -->
{{--
<link href="{{ asset('front-end/css/pink-theme.css') }}" rel="stylesheet"> --}}
<!-- <link href="css/purple-theme.css" rel="stylesheet"> -->
<!-- <link href="css/skyblue-theme.css" rel="stylesheet"> -->
<!-- <link href="css/red-theme.css" rel="stylesheet"> -->
<!-- <link href="css/violet-theme.css" rel="stylesheet"> -->

<!-- RESPONSIVE CSS -->
<link href="{{ asset('front-end/css/responsive.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/fontawesome/css/solid.min.css') }}">
@stack('css')


<style>
  /* Add WA floating button CSS */
  .floating {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .fab-icon {
            margin-top: 16px;
        }
</style>