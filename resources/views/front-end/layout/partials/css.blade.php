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

  /* Navbar CTA: Bayar Tagihan & Daftar Sekarang */
  .wsmenu > .wsmenu-list > li.nav-cta-item > a.nav-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    height: 44px;
    line-height: 1;
    margin: 13px 0 13px 12px;
    padding: 0 18px;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 700;
    transition: all 0.2s ease;
  }

  .wsmenu > .wsmenu-list > li.nav-cta-item > a.nav-cta--outline {
    border: 1.5px solid #cbd6e6;
    background: #fff;
    color: #1b2a44 !important;
  }

  .wsmenu > .wsmenu-list > li.nav-cta-item > a.nav-cta--outline:hover {
    border-color: #0b4fa8;
    color: #0b4fa8 !important;
  }

  .wsmenu > .wsmenu-list > li.nav-cta-item > a.nav-cta--red {
    background: #c8102e;
    color: #fff !important;
  }

  .wsmenu > .wsmenu-list > li.nav-cta-item > a.nav-cta--red:hover {
    background: #a30d25;
  }

  .wsmenu > .wsmenu-list > li.nav-cta-item > a.nav-cta svg {
    flex-shrink: 0;
  }

  /* Desktop: rapatkan menu supaya logo + menu + 2 tombol muat satu baris */
  @media only screen and (min-width: 992px) {
    .wsmenu > .wsmenu-list > li > a.h-link {
      margin: 0 2px;
      padding: 10px 12px;
      font-size: 0.95rem;
    }

    .wsmenu > .wsmenu-list > li[aria-haspopup] > a.h-link:has(.wsarrow) {
      padding-right: 24px;
    }

    .wsmenu > .wsmenu-list > li.nl-simple.nav-cta-item > a.nav-cta {
      margin-left: 16px;
    }

    .wsmenu > .wsmenu-list > li.nav-cta-item + li.nav-cta-item > a.nav-cta {
      margin-left: 10px;
    }
  }

  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    .wsmenu > .wsmenu-list > li > a.h-link {
      padding: 10px 8px;
      font-size: 0.9rem;
    }

    .wsmenu > .wsmenu-list > li.nav-cta-item > a.nav-cta {
      padding: 0 12px;
      font-size: 0.85rem;
    }
  }

  @media only screen and (max-width: 991px) {
    .wsmenu > .wsmenu-list > li.nav-cta-item > a.nav-cta {
      display: flex;
      justify-content: center;
      margin: 10px 16px;
    }
  }
</style>