@extends('front-end.layout.base')

@section('title',$page_name)
@section('content')

<!-- HERO-10
			============================================= -->
<section id="hero-10" class="bg--scroll hero-section">
  <div class="container">
    <div class="row d-flex align-items-center">


      <!-- HERO TEXT -->
      <div class="col-md-6">
        <div class="hero-10-txt wow fadeInRight">

          <!-- Title -->
          <h2 class="s-52 w-700">Tentang Kami</h2>
          <!-- Text -->
          <p class="p-lg">Idnet hadir untuk mengoptimalkan aktivitas digital kita semua dengan layanan internet yang
            super kencang dan dapat diandalkan.
            Jelajahi internet dengan bebas dan tanpa khawatir akan jaringan yang tidak stabil dengan kualitas koneksi
            yang terpercaya dan layanan customer service yang siap siaga.</p>
        </div>
      </div> <!-- END HERO TEXT -->


      <!-- HERO IMAGE -->
      <div class="col-md-6">
        <div class="hero-11-img wow fadeInLeft">
          {{-- <img class="img-fluid" src="{{ asset('front-end/images/dashboard-04.png') }}" alt="hero-image"> --}}
          <iframe width="900" height="600" src="https://www.youtube.com/embed/TlGkoH3JSUo?autoplay=1&mute=1"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share;"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </div>


    </div> <!-- End row -->
  </div> <!-- End container -->
</section> <!-- END HERO-10 -->


<!-- CONTACTS-1
			============================================= -->
<section id="contacts-1" class="pb-50 inner-page-hero contacts-section division">
  <div class="container">
    <!-- SECTION TITLE -->
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-9">
        <div class="section-title text-center mb-80">

          <!-- Title -->
          <h2 class="s-40 w-700">Bagaimana Kami dapat membantu anda?</h2>

          <!-- Text -->
          <p class="p-lg">Silahkan kirimkan pertanyaan atau pesan anda melalui formulir berikut dan kami akan segera
            menghubungi anda kembali.
          </p>

        </div>
      </div>
    </div>


    <!-- CONTACT FORM -->
    <div class="row justify-content-center">
      <div class="col-md-11 col-lg-10 col-xl-8">
        <div class="form-holder">
          <form name="contactform" class="row contact-form">

            <!-- Form Select -->
            <div class="col-md-6 input-subject">
              <p class="p-lg">Subject / Topik</p>
              <select class="form-select subject" aria-label="Default select example">
                <option selected>Subject...</option>
                <option>Tagihan</option>
                <option>Gangguan Layanan</option>
                <option>Lainnya</option>
              </select>
            </div>

            <!-- Contact Form Input -->
            <div class="col-md-6">
              <p class="p-lg">No Pelanggan</p>
              <input type="text" name="name" class="form-control name" placeholder="No ID Pelanggan">
            </div>

            <div class="col-md-6">
              <p class="p-lg">Email Address</p>
              <input type="text" name="email" class="form-control email" placeholder="Email Address*">
            </div>

            <div class="col-md-6">
              <p class="p-lg">Telepon</p>
              <input type="text" name="telepon" class="form-control email" placeholder="No Telepon">
            </div>

            <div class="col-md-12">
              <p class="p-lg">Pesan</p>
              <textarea class="form-control message" name="message" rows="6"
                placeholder="Saya mempunyai kendala..."></textarea>
            </div>

            <!-- Contact Form Button -->
            <div class="col-md-12 mt-15 form-btn text-right">
              <button type="submit" class="btn btn--theme hover--theme submit">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- END CONTACT FORM -->
  </div> <!-- End container -->
</section> <!-- END CONTACTS-1 -->

@endsection