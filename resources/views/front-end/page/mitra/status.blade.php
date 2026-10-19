@extends('front-end.layout.base')

@section('title', $page_name)

@php
    use App\Models\MitraRegistration;

    $badge = [
        'done' => ['Selesai', 'mtr-badge--success'],
        'current' => ['Proses', ''],
        'pending' => ['Menunggu', 'mtr-badge--muted'],
    ];
    $keterangan = [
        'done' => null,
        'current' => 'Sedang dalam proses',
        'pending' => 'Menunggu',
    ];
    $invalid = fn($key) => $errors->has($key) ? 'is-invalid' : '';
@endphp

@section('content')
    <link rel="stylesheet"
        href="{{ asset('front-end/css/mitra.css') }}?v={{ filemtime(public_path('front-end/css/mitra.css')) }}">

    <div class="mtr">
        <section class="mtr-section">
            <div class="mtr-container">
                <h1 class="mtr-title">Status Pendaftaran</h1>
                <p class="mtr-subtitle">Pantau perkembangan pendaftaran Anda di sini.</p>

                <form method="GET" action="{{ route('mitra.status') }}" class="mtr-card mtr-search">
                    <div>
                        <input type="text" name="nomor" value="{{ old('nomor', request('nomor')) }}"
                            placeholder="Nomor pendaftaran (MTR-...)" class="mtr-input {{ $invalid('nomor') }}"
                            style="text-transform:uppercase">
                        @error('nomor')
                            <p class="mtr-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="email" name="email" value="{{ old('email', request('email')) }}"
                            placeholder="Email yang didaftarkan" class="mtr-input {{ $invalid('email') }}">
                        @error('email')
                            <p class="mtr-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="mtr-btn mtr-btn--primary">Cek Status</button>
                </form>

                @if ($registration)
                    <div class="mtr-status">
                        <div class="mtr-card">
                            <div class="mtr-status__company">
                                <small>{{ $registration->registration_number }} · {{ $registration->type_label }}</small>
                                <strong>{{ $registration->company_name }}</strong>
                            </div>

                            <ol class="mtr-timeline">
                                @foreach ($timeline as $step)
                                    @php [$badgeText, $badgeClass] = $badge[$step['state']]; @endphp
                                    <li class="mtr-tl is-{{ $step['state'] }}">
                                        <span class="mtr-tl__dot">
                                            @if ($step['state'] === 'done')
                                                @include('front-end.page.mitra.partials.icon', [
                                                    'name' => 'check',
                                                ])
                                            @endif
                                        </span>
                                        <div class="mtr-tl__body">
                                            <div>
                                                <strong>{{ $step['label'] }}</strong>
                                                <small>{{ $step['date']?->translatedFormat('d M Y, H:i') ?? $keterangan[$step['state']] }}</small>
                                            </div>
                                            <span class="mtr-badge {{ $badgeClass }}">{{ $badgeText }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>

                            @if ($registration->status === MitraRegistration::STATUS_REJECTED && $registration->admin_notes)
                                <div class="mtr-alert mtr-alert--danger">
                                    <strong>Catatan dari tim kami:</strong>
                                    {{ $registration->admin_notes }}
                                </div>
                            @elseif ($registration->status === MitraRegistration::STATUS_APPROVED)
                                <div class="mtr-alert mtr-alert--success">
                                    Selamat! Pendaftaran Anda telah disetujui. Informasi akun dashboard vendor akan
                                    dikirim ke email Anda.
                                </div>
                            @endif
                        </div>

                        <div class="mtr-side">
                            <div class="mtr-card">
                                <h3>Informasi Tambahan</h3>
                                <p>Kami akan menghubungi Anda melalui email/WhatsApp jika ada informasi lebih lanjut.</p>
                            </div>

                            <div class="mtr-card mtr-help-card">
                                @include('front-end.page.mitra.partials.icon', ['name' => 'headset'])
                                <h3>Butuh Bantuan?</h3>
                                <p>Tim procurement kami siap membantu Anda.</p>
                                <a href="https://wa.me/6281234567890" target="_blank"
                                    class="mtr-btn mtr-btn--line mtr-btn--sm">Hubungi Kami</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
