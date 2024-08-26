@extends('front-end.layout.base')

@section('title', $page_name)

@push('css')
    <style>
        .cekarea {
            background-color: #25316D
        }
    </style>
@endpush

@section('content')
    <!-- HERO-2                                                                       ============================================= -->
    <section id="hero-2" class="bg--05 hero-section">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">


                <!-- HERO IMAGE -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="hero-2-img wow fadeInRight">
                        <img class="img-fluid" src="{{ asset('front-end/images/hero-img2.png') }}" alt="hero-image">
                    </div>
                </div>


                <!-- HERO TEXT -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="hero-2-txt wow fadeInLeft">

                        <!-- Title -->
                        <h2 class="s-45 w-700 color--white">Cek Area Layanan Internet Wifi Idnet Di Daerah Kamu!</h2>

                        <!-- Text -->
                        <p class="p-lg color--white">Nikmati Jaringan Internet Tercepat dan Unlimited. Cek sekarang apakah
                            kotamu sudah tercover oleh jaringan Idnet.</p>

                    </div>
                </div> <!-- END HERO TEXT -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END HERO-2 -->








    <!-- CEK AREA
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ============================================= -->
    <section id="features-2" class="py-50 features-section division bg-map">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">

                    <!-- CONTACT FORM -->

                    <div class="form-holder p-5 r-10 cekarea">
                        <div class="section-title mb-30">
                            <!-- Title -->
                            <h2 class="s-30 w-700 color--white ">Periksa Alamat Anda</h2>
                        </div>
                        <form class="row contact-form color--white">

                            <!-- Form Select -->
                            <div class="col-md-12 input-subject">
                                <select class="form-select subject" id="kota" aria-label="Default select example">
                                    <option>Pilih Kota</option>
                                    @foreach ($kota as $k)
                                        <option value="{{ $k->id }}">{{ $k->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 input-subject">
                                <select class="form-select subject" id="kecamatan" name="kecamatan"
                                    aria-label="Default select example">
                                    <option value="">Pilih Kecamatan</option>

                                </select>
                            </div>
                            <div class="col-md-12 input-subject">
                                <select class="form-select subject" id="kelurahan" name="kelurahan"
                                    aria-label="Default select example">
                                    <option>Pilih Kelurahan</option>

                                </select>
                            </div>
                            <div class="col-md-12 input-subject">

                                <select class="form-select subject" id="jalan" name="jalan"
                                    aria-label="Default select example">
                                    <option>Pilih Alamat</option>

                                </select>
                            </div>
                            <div class="d-flex">
                                <button type="submit" id="cekarea" class="btn btn-sm btn--tra-white"
                                    style="display: none;" disabled>Cek Area</button>
                            </div>

                        </form>

                    </div> <!-- END CONTACT FORM -->


                    <div class="mt-10 text-center pt-100  py-20 d-none h-180" id="result">
                        <h4 class="s-24 w-500">Area Ini Sudah Tercover Idnet</h4>
                        <a href="https://forms.gle/JWxGAcGYQt2bmLf18" target="_blank"><button
                                class="btn btn-sm btn--theme mt-10">Daftar</button></a>
                    </div>

                </div>
            </div>
        </div> <!-- End container -->
    </section> <!-- END CEK AREA-2 -->



    @push('js')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#kota').on('change', function() {
                    var kotaID = $(this).val();
                    if (kotaID) {
                        $.ajax({
                            url: '/get-kecamatan/' + kotaID,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('#kecamatan').empty().append(
                                    '<option value="">Pilih Kecamatan</option>');
                                $('#kelurahan').empty().append(
                                    '<option value="">Pilih Kelurahan</option>');
                                $('#jalan').empty().append('<option value="">Pilih Jalan</option>');
                                $.each(data, function(key, value) {
                                    $('#kecamatan').append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#kecamatan, #kelurahan, #jalan').empty().append('<option value="">Pilih</option>');
                    }
                });

                $('#kecamatan').on('change', function() {
                    var kecamatanID = $(this).val();
                    if (kecamatanID) {
                        $.ajax({
                            url: '/get-kelurahan/' + kecamatanID,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('#kelurahan').empty().append(
                                    '<option value="">Pilih Kelurahan</option>');
                                $('#jalan').empty().append('<option value="">Pilih Jalan</option>');
                                $.each(data, function(key, value) {
                                    $('#kelurahan').append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#kelurahan, #jalan').empty().append('<option value="">Pilih</option>');
                    }
                });

                $('#kelurahan').on('change', function() {
                    var kelurahanID = $(this).val();
                    if (kelurahanID) {
                        $.ajax({
                            url: '/get-jalan/' + kelurahanID,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('#jalan').empty().append('<option value="">Pilih Jalan</option>');
                                $.each(data, function(key, value) {
                                    $('#jalan').append('<option value="' + value.id + '">' +
                                        value.name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#jalan').empty().append('<option value="">Pilih Jalan</option>');
                    }
                });
            });

            $('#jalan').on('change', function() {
                var jalanID = $(this).val();
                if (jalanID) {
                    $('#cekarea').show().prop('disabled', false);
                } else {
                    $('#cekarea').hide().prop('disabled', true);
                }
            });


            $('#cekarea').on('click', function(e) {
                e.preventDefault();
                var jalanID = $('#jalan').val();
                if (jalanID) {
                    $('#result').removeClass('d-none');
                    // Scroll to the result element
                    $('html, body').animate({
                        scrollTop: $('#result').offset().top
                    }, 1000);
                }

            });
        </script>
    @endpush
@endsection
