@extends('backend.layout.app')

@section('title', 'Detail Lamaran')

@section('content')
    @php
        $fmt = fn($v, $f = 'd M Y') => $v ? \Carbon\Carbon::parse($v)->format($f) : '-';
        $badge = \App\Http\Controllers\Backend\karir\LamaranController::badge($lamaran->status);
    @endphp

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="d-flex align-items-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">Detail Lamaran</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.karir.lamaran.index') }}">{{ $page_name }}</a>
                    </li>
                    <li class="breadcrumb-item">Detail</li>
                </ol>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            <div class="col-lg-8">
                {{-- Header pelamar --}}
                <div class="card mb-4">
                    <div class="card-body d-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="mb-1">{{ $lamaran->nama_lengkap }}</h4>
                            <div class="text-muted">Melamar sebagai <strong>{{ $lamaran->lowongan?->judul ?? '-' }}</strong>
                            </div>
                            <small class="text-muted">Kode {{ $lamaran->kode }} · Dikirim
                                {{ $fmt($lamaran->dikirim_at, 'd M Y H:i') }}</small>
                        </div>
                        <span class="badge {{ $badge }}">{{ Str::headline($lamaran->status?->name) }}</span>
                    </div>
                </div>

                {{-- Data pribadi --}}
                <div class="card mb-4">
                    <h5 class="card-header">Data Pribadi</h5>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-4 text-muted fw-normal">Email</dt>
                            <dd class="col-sm-8"><a href="mailto:{{ $lamaran->email }}">{{ $lamaran->email }}</a></dd>

                            <dt class="col-sm-4 text-muted fw-normal">Telepon</dt>
                            <dd class="col-sm-8">
                                {{ $lamaran->telepon }}
                                <a href="https://wa.me/{{ ltrim($lamaran->telepon, '+') }}" target="_blank"
                                    class="ms-1 small">WhatsApp</a>
                            </dd>

                            <dt class="col-sm-4 text-muted fw-normal">Tempat, Tgl Lahir</dt>
                            <dd class="col-sm-8">{{ $lamaran->tempat_lahir }}, {{ $fmt($lamaran->tanggal_lahir) }}</dd>

                            <dt class="col-sm-4 text-muted fw-normal">Jenis Kelamin</dt>
                            <dd class="col-sm-8">{{ $jenisKelamin[$lamaran->jenis_kelamin] ?? $lamaran->jenis_kelamin }}
                            </dd>

                            <dt class="col-sm-4 text-muted fw-normal">Domisili</dt>
                            <dd class="col-sm-8">{{ $lamaran->domisili }}</dd>

                            <dt class="col-sm-4 text-muted fw-normal">LinkedIn</dt>
                            <dd class="col-sm-8 mb-0">
                                @if ($lamaran->linkedin_url)
                                    <a href="{{ $lamaran->linkedin_url }}"
                                        target="_blank">{{ $lamaran->linkedin_url }}</a>
                                @else
                                    -
                                @endif
                            </dd>
                        </dl>
                    </div>
                </div>

                {{-- Pendidikan --}}
                <div class="card mb-4">
                    <h5 class="card-header">Pendidikan</h5>
                    <div class="card-body">
                        <div class="fw-semibold">{{ $lamaran->pendidikan_terakhir }} · {{ $lamaran->nama_institusi }}
                        </div>
                        <div class="text-muted">
                            {{ $lamaran->jurusan }}
                            @if ($lamaran->tahun_masuk || $lamaran->tahun_lulus)
                                · {{ $lamaran->tahun_masuk ?? '?' }}–{{ $lamaran->tahun_lulus ?? '?' }}
                            @endif
                            @if ($lamaran->ipk)
                                · IPK {{ $lamaran->ipk }}
                            @endif
                        </div>

                        @if (!empty($lamaran->pendidikan_lainnya))
                            <hr>
                            <div class="small text-muted mb-1">Pendidikan / pelatihan lainnya</div>
                            <ul class="mb-0 ps-3">
                                @foreach ($lamaran->pendidikan_lainnya as $item)
                                    <li>{{ is_array($item) ? implode(' · ', array_filter($item)) : $item }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                {{-- Pengalaman --}}
                <div class="card mb-4">
                    <h5 class="card-header">Pengalaman Kerja</h5>
                    <div class="card-body">
                        @forelse ($lamaran->pengalaman ?? [] as $p)
                            <div class="{{ !$loop->last ? 'border-bottom pb-3 mb-3' : '' }}">
                                <div class="fw-semibold">{{ $p['posisi'] ?? '-' }}</div>
                                <div>{{ $p['nama_perusahaan'] ?? '-' }}</div>
                                <small class="text-muted">
                                    {{ $fmt($p['mulai'] ?? null, 'M Y') }} –
                                    {{ !empty($p['selesai']) ? $fmt($p['selesai'], 'M Y') : 'Sekarang' }}
                                </small>
                                @if (!empty($p['deskripsi']))
                                    <p class="mb-0 mt-1">{{ $p['deskripsi'] }}</p>
                                @endif
                            </div>
                        @empty
                            <span class="text-muted">Belum memiliki pengalaman kerja.</span>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                {{-- Ubah status cepat --}}
                <div class="card mb-4">
                    <h5 class="card-header">Status Lamaran</h5>
                    <div class="card-body">
                        <form action="{{ route('admin.karir.lamaran.status', $lamaran) }}" method="POST"
                            class="d-flex gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select">
                                @foreach ($statuses as $s)
                                    <option value="{{ $s->value }}" @selected($lamaran->status === $s)>
                                        {{ Str::headline($s->name) }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>

                {{-- Dokumen --}}
                <div class="card mb-4">
                    <h5 class="card-header">Dokumen</h5>
                    <div class="list-group list-group-flush">
                        @forelse ($lamaran->dokumen ?? [] as $jenis => $path)
                            <a href="{{ route('admin.karir.lamaran.dokumen', [$lamaran, $jenis]) }}" target="_blank"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <span><i
                                        class="bx bx-file me-2"></i>{{ $dokumenLabel[$jenis] ?? Str::headline($jenis) }}</span>
                                <i class="bx bx-link-external text-muted"></i>
                            </a>
                        @empty
                            <div class="list-group-item text-muted">Tidak ada dokumen.</div>
                        @endforelse
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <a href="{{ route('admin.karir.lamaran.edit', $lamaran) }}" class="btn btn-warning">
                        <i class="bx bx-edit me-1"></i> Edit
                    </a>
                    <form action="{{ route('admin.karir.lamaran.destroy', $lamaran) }}" method="POST"
                        onsubmit="return confirm('Hapus lamaran ini?')" class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger"><i class="bx bx-trash me-1"></i> Hapus</button>
                    </form>
                    <a href="{{ route('admin.karir.lamaran.index') }}" class="btn btn-outline-secondary">
                        <i class="bx bx-arrow-back me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
