@extends('front-end.layout.base')

@section('title', $page_name)

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <style>
        .cekarea {
            background-color: #25316D
        }
    </style>
@endpush

@section('content')
    <!-- HERO-2============================================= -->
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
                        <h2 class="s-45 w-700 color--white">Cek Area Layanan Internet WiFi CSNET di Daerah Kamu!</h2>
                        <!-- Text -->
                        <p class="p-lg color--white">Nikmati jaringan internet tercepat dan tanpa batas. Cek sekarang apakah
                            kotamu sudah tercover oleh jaringan CSNET.</p>
                    </div>
                </div> <!-- END HERO TEXT -->
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END HERO-2 -->

    <section id="contacts-1" class="pb-50 inner-page-hero contacts-section division">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title text-center mb-80">
                        <!-- Title -->
                        <h2 class="s-52 w-700">
                            Periksa Alamat Anda
                        </h2>
                        <!-- Text -->
                        <p class="p-lg">
                            Cek sekarang apakah kotamu sudah tercover oleh jaringan CSNET dan nikmati jaringan internet
                            tercepat dan tanpa batas
                        </p>
                        <br>
                        <h1 id="result-check" class="d-none"></h1>
                    </div>
                </div>
            </div>


            <div class="form-holder mt-20" style="width:100%;">

                <input type="text" id="map-search" autocomplete="off" placeholder="Cari alamat / area..."
                    style="width:100%; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; margin-bottom:8px; box-sizing:border-box;">
                <ul id="map-results"
                    style="display:none; list-style:none; margin:0 0 8px; padding:0; max-height:220px; overflow:auto; border:1px solid #e5e7eb; border-radius:8px; background:#fff;">
                </ul>

                <div id="map-picker" style="width:100%; height:450px; border:1px solid #d1d5db; border-radius:8px;"></div>
                <small style="color:#6b7280;">Klik peta atau geser marker untuk memilih titik.</small>

                <div style="display:flex; gap:8px; margin-top:10px; flex-wrap:wrap;">
                    <input type="text" name="latitude" id="latitude" placeholder="Latitude" readonly
                        value="{{ old('latitude', $latitude ?? '') }}"
                        style="flex:1; min-width:140px; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; background:#f9fafb;">
                    <input type="text" name="longitude" id="longitude" placeholder="Longitude" readonly
                        value="{{ old('longitude', $longitude ?? '') }}"
                        style="flex:1; min-width:140px; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; background:#f9fafb;">
                    <button type="button" id="check-area"
                        style="padding:10px 16px; border:0; border-radius:8px; background:#2563eb; color:#fff; cursor:pointer;">
                        Periksa Area Ini
                    </button>
                </div>
            </div>
            <!-- Cek Area FORM -->
            {{-- <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10 col-xl-8">
                    <!-- Cek Area Result -->
                    <div class="d-none col-lg-12 contact-form-msg text-center" id="result">
                        <p class="p-lg">Area Ini Sudah Tercover CSNET</p>
                        <a href="https://forms.gle/JWxGAcGYQt2bmLf18" target="_blank">
                            <button class="btn btn-sm btn--theme hover--theme">Daftar</button>
                        </a>
                    </div>
                    <div class="form-holder mt-20">
                        <form name="contactform" class="row contact-form">
                            <!-- Form Select -->
                            <div class="col-md-12 input-subject">
                                <p class="p-lg">Kota: </p>
                                <select class="form-select subject" id="kota" aria-label="Default select example">
                                    <option selected>
                                        Pilih Kota
                                    </option>
                                    @foreach ($kota as $k)
                                        <option value="{{ $k->id }}">{{ $k->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Contact Form Input -->
                            <div class="col-md-12">
                                <p class="p-lg">Kecamatan: </p>
                                <select class="form-select subject" id="kecamatan" aria-label="Default select example">
                                    <option selected>
                                        Pilih Kecamatan
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <p class="p-lg">Kelurahan: </p>
                                <select class="form-select subject" id="kelurahan" aria-label="Default select example">
                                    <option selected>
                                        Pilih Kelurahan
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <p class="p-lg">Alamat: </p>
                                <select class="form-select subject" id="jalan" aria-label="Default select example">
                                    <option selected>
                                        Pilih Alamat
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-12 mt-15 form-btn text-right">
                                <button type="submit" id="cekarea" style="display: none;" disabled
                                    class="btn btn--theme hover--theme submit">
                                    Cek Area
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- END Cek Area FORM --> --}}
        </div> <!-- End container -->
    </section>

    <!-- CEK AREA                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ============================================= -->
    {{-- <section id="features-2" class="py-50 features-section division bg-map">
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
    </section> <!-- END CEK AREA-2 --> --}}

    @push('js')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
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

            document.addEventListener('DOMContentLoaded', function() {
                const latEl = document.getElementById('latitude');
                const lngEl = document.getElementById('longitude');
                const start = (latEl.value && lngEl.value) ? [parseFloat(latEl.value), parseFloat(lngEl.value)] : [-
                    8.2967593, 114.2984855
                ];

                const map = L.map('map-picker', {
                    maxZoom: 21
                }).setView(start, 15);

                L.tileLayer('https://mt{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                    maxZoom: 21,
                    subdomains: ['0', '1', '2', '3'],
                    attribution: '&copy; Google'
                }).addTo(map);

                // Label jalan & nama tempat
                L.tileLayer(
                    'https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
                        maxZoom: 20,
                        maxNativeZoom: 17
                    }).addTo(map);

                const marker = L.marker(start, {
                    draggable: true
                }).addTo(map);

                function setPoint(lat, lng, zoom) {
                    lat = (+lat).toFixed(7);
                    lng = (+lng).toFixed(7);
                    marker.setLatLng([lat, lng]);
                    latEl.value = lat;
                    lngEl.value = lng;
                    if (zoom) map.setView([lat, lng], zoom);
                }
                if (latEl.value) setPoint(latEl.value, lngEl.value);

                map.on('click', e => setPoint(e.latlng.lat, e.latlng.lng));
                marker.on('dragend', e => {
                    const p = e.target.getLatLng();
                    setPoint(p.lat, p.lng);
                });

                // Search
                const search = document.getElementById('map-search');
                const results = document.getElementById('map-results');
                const cek = document.getElementById('check-area');
                let t;
                search.addEventListener('input', function() {
                    clearTimeout(t);
                    const q = this.value.trim();
                    if (q.length < 3) {
                        results.style.display = 'none';
                        return;
                    }
                    t = setTimeout(async () => {
                        const r = await fetch(
                            `https://nominatim.openstreetmap.org/search?format=json&limit=6&countrycodes=id&q=${encodeURIComponent(q)}`
                        );
                        const data = await r.json();
                        results.innerHTML = data.length ?
                            data.map(d =>
                                `<li data-lat="${d.lat}" data-lng="${d.lon}" style="padding:8px 12px; cursor:pointer; border-bottom:1px solid #f3f4f6;">${d.display_name}</li>`
                            ).join('') :
                            '<li style="padding:8px 12px; color:#9ca3af;">Tidak ditemukan</li>';
                        results.style.display = 'block';
                    }, 500);
                });

                results.addEventListener('click', e => {
                    const li = e.target.closest('li[data-lat]');
                    if (!li) return;
                    setPoint(li.dataset.lat, li.dataset.lng, 17);
                    search.value = li.textContent.trim();
                    results.style.display = 'none';
                });

                // Prefill dari form Cek Area di halaman home (?q=...)
                const initialQuery = new URLSearchParams(window.location.search).get('q');
                if (initialQuery) {
                    search.value = initialQuery;
                    search.dispatchEvent(new Event('input'));
                    search.focus();
                }

                const API_URL = "{{ rtrim(config('app.base_url_api'), '/') }}";

                const getCoords = () => ({
                    latitude: document.getElementById('latitude').value.trim(),
                    longitude: document.getElementById('longitude').value.trim(),
                });

                const setLoading = (btn, loading, text = 'Mengecek...') => {
                    if (loading) {
                        btn.dataset.label = btn.innerHTML;
                        btn.innerHTML = text;
                    } else {
                        btn.innerHTML = btn.dataset.label ?? btn.innerHTML;
                    }
                    btn.disabled = loading;
                };

                const getErrorMessage = (res, data) => {
                    if (res.status === 422 && data?.errors) {
                        return Object.values(data.errors).flat().join('\n');
                    }
                    return data?.message ?? 'Terjadi kesalahan.';
                };

                async function checkCoverage(payload) {
                    const res = await fetch(`${API_URL}/check`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(payload),
                    });

                    const data = await res.json().catch(() => null);

                    if (!res.ok) throw new Error(getErrorMessage(res, data));

                    return data;
                }

                cek.addEventListener('click', async e => {
                    e.preventDefault();

                    const coords = getCoords();
                    if (!coords.latitude || !coords.longitude) {
                        alert('Pilih titik lokasi di peta terlebih dahulu.');
                        return;
                    }

                    setLoading(cek, true);

                    try {
                        const data = await checkCoverage(coords);

                        const el = document.getElementById("result-check");
                        el.classList.remove("d-none", "text-success", "text-danger");

                        if (data.ready) {
                            el.classList.add("text-success");
                            el.innerHTML =
                                `AREA TERCOVER<br><small class="fs-6">ODP: ${data.odp_name} (${data.distance} m)</small>`;
                        } else {
                            el.classList.add("text-danger");
                            el.innerHTML =
                                `AREA BELUM TERCOVER<br><small class="fs-6">${data.message}</small>`;
                        }
                    } catch (err) {
                        console.error(err);
                        alert(err instanceof TypeError && err.message.includes('fetch') ?
                            'Gagal terhubung ke API.' :
                            err.message);
                    } finally {
                        setLoading(cek, false);
                    }
                });

                setTimeout(() => map.invalidateSize(), 300);
            });
        </script>
    @endpush
@endsection
