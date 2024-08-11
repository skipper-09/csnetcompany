@extends('front-end.layout.base')

@section('title', $page_name)

@push('css')
    <style>
        iframe{
         width: 100%   
        }
    </style>
@endpush
@section('content')

    <!-- HERO-18============================================= -->
    <section id="hero-18" class="bg--scroll hero-section">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- HERO IMAGE -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="hero-18-img wow fadeInRight">
                        <img class="img-fluid"
                            src="https://www.myrepublic.co.id/_next/image?url=%2Fimg%2Fgothel%2Fuploads%2Fabout_page_header_1_3dc6fecf9d.png&w=640&q=75"
                            alt="hero-image">
                    </div>
                </div>


                <!-- HERO TEXT -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="hero-18-txt wow fadeInLeft">

                        <!-- Title -->
                        <h2 class="s-56 w-700">Tentang Kami</h2>

                        <!-- Text -->
                        <p class="p-xl">Idnet hadir untuk mengoptimalkan aktivitas digital kita semua dengan layanan
                            internet yang super kencang dan dapat diandalkan. Jelajahi internet dengan bebas dan tanpa
                            khawatir akan jaringan yang tidak stabil dengan kualitas koneksi yang terpercaya dan layanan
                            customer service yang siap siaga.
                        </p>



                    </div>
                </div> <!-- END HERO TEXT -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END HERO-18 -->

    <!-- CONTACTS-1============================================= -->
    <section id="contacts-1" class="pb-50 inner-page-hero contacts-section division">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title text-center mb-80">

                        <!-- Title -->
                        <h2 class="s-40 w-700">Bagaimana Kami dapat membantu anda?</h2>

                        <!-- Text -->
                        <p class="p-lg">Silahkan kirimkan pertanyaan atau pesan anda melalui formulir berikut dan kami
                            akan segera
                            menghubungi anda kembali.
                        </p>

                    </div>
                </div>
            </div>


            <!-- CONTACT FORM -->
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10 col-xl-8">
                    <div class="form-holder">
                        <form  id="whatsappForm" action="#" method="POST" class="row contact-form">

                            <!-- Form Select -->
                            <div class="col-md-6 input-subject">
                                <p class="p-lg">Subject / Topik</p>
                                <select id="subject" class="form-select subject" aria-label="Default select example" aria-required="true">
                                    <option value=" ">Subject...</option>
                                    <option value="Tagihan">Tagihan</option>
                                    <option value="Gangguan Layanan">Gangguan Layanan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <!-- Contact Form Input -->
                            <div class="col-md-6">
                                <p class="p-lg">Nama</p>
                                <input type="text"  class="form-control name" id="nama"
                                    placeholder="Nama" required>
                            </div>

                            <div class="col-md-6">
                                <p class="p-lg">Email Address</p>
                                <input type="text"  class="form-control email" id="email"
                                    placeholder="Email Address" required>
                            </div>

                            <div class="col-md-6">
                                <p class="p-lg">Id Pelanggan</p>
                                <input type="text" id="idpel"  class="form-control email" placeholder="Id Pelanggan" required>
                            </div>

                            <div class="col-md-12">
                                <p class="p-lg">Pesan</p>
                                <textarea class="form-control message" id="pesan"  rows="6" placeholder="Saya mempunyai kendala..." required></textarea>
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


    <section class="pb-50 inner-page-hero contacts-section division">
        <div class="container-fluid">
            <div class="section-title text-center mb-80">
                <!-- Title -->
                <h2 class="s-40 w-700">Lokasi Kantor Kami</h2>
            </div>
            <div class="d-flex justify-content-center align-content-center w-full">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.2534680421713!2d113.67975527388964!3d-8.177200881965254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695ff742fd511%3A0xce77bf76306d86e6!2sIDNET!5e0!3m2!1sid!2sid!4v1718975737414!5m2!1sid!2sid"
                     height="600" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    </section>
    </div>

@endsection

@push("js")
    <script>
       
        document.getElementById('whatsappForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting the traditional way

    // Get the phone number and message
    const subject = document.getElementById('subject').value;
            const idpel = document.getElementById('idpel').value;
            const email = document.getElementById('email').value;
            const nama = document.getElementById('nama').value;
            const pesan = document.getElementById('pesan').value;

    // Encode the message to be URL-safe
    const encodedMessage = encodeURIComponent(pesan);

    // Build the WhatsApp URL
    const whatsappUrl = `https://api.whatsapp.com/send?phone=6282116879977&text=*Halo%20Admin*%0A%0ASubject%20*${subject}*%0A%0ASaya%20*${nama}*%0AId%20Pelanggan%20*${idpel}*%0AEmail%20*${email}*%0A%0A${pesan}%0A`;

    // Redirect the user to WhatsApp
    window.location.href = whatsappUrl;
});

    </script>
@endpush
