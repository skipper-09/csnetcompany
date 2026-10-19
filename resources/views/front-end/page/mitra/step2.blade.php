@extends('front-end.layout.base')

@section('title', $page_name)

@php
    $val = fn($key) => old($key, $data[$key] ?? '');
    $invalid = fn($key) => $errors->has($key) ? 'is-invalid' : '';
@endphp

@section('content')
    <link rel="stylesheet"
        href="{{ asset('front-end/css/mitra.css') }}?v={{ filemtime(public_path('front-end/css/mitra.css')) }}">

    <div class="mtr">
        <section class="mtr-section">
            <div class="mtr-container mtr-container--md">
                @include('front-end.page.mitra.partials.stepper', ['current' => 2])

                <form action="{{ route('mitra.step.store', 2) }}" method="POST" class="mtr-card">
                    @csrf

                    <div class="mtr-card__head">
                        <div>
                            <h2>Detail Usaha</h2>
                            <p class="mtr-subtitle">Lengkapi informasi terkait bidang usaha dan layanan Anda.</p>
                        </div>
                    </div>

                    <div class="mtr-grid">
                        <div class="mtr-field">
                            <label class="mtr-label">Kategori Utama <span class="req">*</span></label>
                            <select name="main_category" data-categories='@json($categories)'
                                class="mtr-input {{ $invalid('main_category') }}">
                                <option value="">Pilih kategori</option>
                                @foreach (array_keys($categories) as $cat)
                                    <option value="{{ $cat }}" @selected($val('main_category') === $cat)>{{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                            @error('main_category')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">Sub Kategori <span class="req">*</span></label>
                            <select name="sub_category" data-subcategory data-old="{{ $val('sub_category') }}"
                                class="mtr-input {{ $invalid('sub_category') }}">
                                <option value="">Pilih sub kategori</option>
                            </select>
                            @error('sub_category')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field mtr-col-full">
                            <label class="mtr-label">Deskripsi Perusahaan <span class="req">*</span></label>
                            <textarea name="description" rows="4" maxlength="500" data-counter placeholder="Jelaskan profil perusahaan Anda"
                                class="mtr-input {{ $invalid('description') }}">{{ $val('description') }}</textarea>
                            <div class="mtr-help">
                                @error('description')
                                    <span class="mtr-error">{{ $message }}</span>
                                @enderror
                                <span class="mtr-counter">0/500</span>
                            </div>
                        </div>

                        <div class="mtr-field mtr-col-full">
                            <label class="mtr-label">Produk / Layanan yang Ditawarkan <span class="req">*</span></label>
                            <textarea name="products_services" rows="4" maxlength="500" data-counter
                                placeholder="Sebutkan produk atau layanan utama Anda" class="mtr-input {{ $invalid('products_services') }}">{{ $val('products_services') }}</textarea>
                            <div class="mtr-help">
                                @error('products_services')
                                    <span class="mtr-error">{{ $message }}</span>
                                @enderror
                                <span class="mtr-counter">0/500</span>
                            </div>
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">Area Layanan <span class="req">*</span></label>
                            <select name="service_area" class="mtr-input {{ $invalid('service_area') }}">
                                <option value="">Pilih area layanan</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area }}" @selected($val('service_area') === $area)>{{ $area }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_area')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">Kapasitas Supply / Tim</label>
                            <input type="text" name="supply_capacity" value="{{ $val('supply_capacity') }}"
                                placeholder="Contoh: 1000 unit/bulan / 50 teknisi"
                                class="mtr-input {{ $invalid('supply_capacity') }}">
                            @error('supply_capacity')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">Klien Utama <span class="opt">(opsional)</span></label>
                            <input type="text" name="main_clients" value="{{ $val('main_clients') }}"
                                placeholder="Contoh: Nama perusahaan / instansi"
                                class="mtr-input {{ $invalid('main_clients') }}">
                            @error('main_clients')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">Sertifikasi <span class="opt">(opsional)</span></label>
                            <input type="text" name="certifications" value="{{ $val('certifications') }}"
                                placeholder="Contoh: ISO 9001, TKDN, dll"
                                class="mtr-input {{ $invalid('certifications') }}">
                            @error('certifications')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mtr-actions">
                        <a href="{{ route('mitra.step', 1) }}" class="mtr-btn mtr-btn--outline">Kembali</a>
                        <button type="submit" class="mtr-btn mtr-btn--primary">
                            Lanjut ke Upload Dokumen
                            @include('front-end.page.mitra.partials.icon', ['name' => 'arrow'])
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script src="{{ asset('front-end/js/mitra.js') }}?v={{ filemtime(public_path('front-end/js/mitra.js')) }}"></script>
@endsection
