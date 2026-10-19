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
                @include('front-end.page.mitra.partials.stepper', ['current' => 1])

                <form action="{{ route('mitra.step.store', 1) }}" method="POST" class="mtr-card">
                    @csrf

                    <div class="mtr-card__head">
                        <div>
                            <h2>Informasi Perusahaan</h2>
                            <p class="mtr-subtitle">Lengkapi data perusahaan Anda dengan benar.</p>
                        </div>
                        <span class="mtr-badge">Pendaftaran {{ ucfirst($type) }}</span>
                    </div>

                    @if (session('warning'))
                        <div class="mtr-alert mtr-alert--warning">{{ session('warning') }}</div>
                    @endif

                    <div class="mtr-grid">
                        <div class="mtr-field">
                            <label class="mtr-label">Nama Perusahaan <span class="req">*</span></label>
                            <input type="text" name="company_name" value="{{ $val('company_name') }}"
                                placeholder="Contoh: PT Mitra Teknologi Nusantara"
                                class="mtr-input {{ $invalid('company_name') }}">
                            @error('company_name')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">Bentuk Badan Usaha <span class="req">*</span></label>
                            <select name="business_entity" class="mtr-input {{ $invalid('business_entity') }}">
                                <option value="">Pilih bentuk usaha</option>
                                @foreach ($entities as $key => $name)
                                    <option value="{{ $key }}" @selected($val('business_entity') === $key)>{{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('business_entity')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">NPWP <span class="req">*</span></label>
                            <input type="text" name="npwp" value="{{ $val('npwp') }}"
                                placeholder="Masukkan NPWP perusahaan" class="mtr-input {{ $invalid('npwp') }}">
                            @error('npwp')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">No. NIB <span class="req">*</span></label>
                            <input type="text" name="nib" inputmode="numeric" maxlength="13"
                                value="{{ $val('nib') }}" placeholder="Masukkan Nomor Induk Berusaha"
                                class="mtr-input {{ $invalid('nib') }}">
                            @error('nib')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field mtr-col-full">
                            <label class="mtr-label">Alamat Kantor <span class="req">*</span></label>
                            <textarea name="address" rows="3" maxlength="300" data-counter placeholder="Masukkan alamat lengkap"
                                class="mtr-input {{ $invalid('address') }}">{{ $val('address') }}</textarea>
                            <div class="mtr-help">
                                @error('address')
                                    <span class="mtr-error">{{ $message }}</span>
                                @enderror
                                <span class="mtr-counter">0/300</span>
                            </div>
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">Provinsi <span class="req">*</span></label>
                            <select name="province" data-wilayah="province" data-old="{{ $val('province') }}"
                                class="mtr-input {{ $invalid('province') }}">
                                <option value="">Pilih provinsi</option>
                            </select>
                            @error('province')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">Kota / Kabupaten <span class="req">*</span></label>
                            <select name="city" data-wilayah="city" data-old="{{ $val('city') }}"
                                class="mtr-input {{ $invalid('city') }}" disabled>
                                <option value="">Pilih kota / kabupaten</option>
                            </select>
                            @error('city')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">Website <span class="opt">(opsional)</span></label>
                            <input type="url" name="website" value="{{ $val('website') }}" placeholder="https://"
                                class="mtr-input {{ $invalid('website') }}">
                            @error('website')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mtr-field">
                            <label class="mtr-label">Tahun Berdiri</label>
                            <input type="number" name="established_year" min="1900" max="{{ now()->year }}"
                                value="{{ $val('established_year') }}" placeholder="Contoh: 2020"
                                class="mtr-input {{ $invalid('established_year') }}">
                            @error('established_year')
                                <p class="mtr-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mtr-divider">
                        <h3>Kontak Penanggung Jawab</h3>
                        <p>Informasi hasil verifikasi akan dikirim ke kontak ini.</p>

                        <div class="mtr-grid mtr-grid--3">
                            <div class="mtr-field">
                                <label class="mtr-label">Nama PIC <span class="req">*</span></label>
                                <input type="text" name="pic_name" value="{{ $val('pic_name') }}"
                                    placeholder="Nama lengkap" class="mtr-input {{ $invalid('pic_name') }}">
                                @error('pic_name')
                                    <p class="mtr-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mtr-field">
                                <label class="mtr-label">Email <span class="req">*</span></label>
                                <input type="email" name="email" value="{{ $val('email') }}"
                                    placeholder="email@perusahaan.co.id" class="mtr-input {{ $invalid('email') }}">
                                @error('email')
                                    <p class="mtr-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mtr-field">
                                <label class="mtr-label">No. WhatsApp <span class="req">*</span></label>
                                <input type="tel" name="phone" value="{{ $val('phone') }}"
                                    placeholder="081234567890" class="mtr-input {{ $invalid('phone') }}">
                                @error('phone')
                                    <p class="mtr-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mtr-actions">
                        <a href="{{ route('mitra.type') }}" class="mtr-btn mtr-btn--outline">Batal</a>
                        <button type="submit" class="mtr-btn mtr-btn--primary">
                            Lanjut ke Detail Usaha
                            @include('front-end.page.mitra.partials.icon', ['name' => 'arrow'])
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script src="{{ asset('front-end/js/mitra.js') }}?v={{ filemtime(public_path('front-end/js/mitra.js')) }}"></script>
@endsection
