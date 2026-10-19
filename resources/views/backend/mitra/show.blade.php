@extends('backend.layout.app')

@section('title', $page_name)

@php
    use App\Models\MitraRegistration;

    $infoPerusahaan = [
        'Jenis' => $mitra->type_label,
        'Nama Perusahaan' => $mitra->company_name,
        'Bentuk Usaha' => $entities[$mitra->business_entity] ?? $mitra->business_entity,
        'NPWP' => $mitra->npwp,
        'No. NIB' => $mitra->nib,
        'Alamat' => "{$mitra->address}, {$mitra->city}, {$mitra->province}",
        'Website' => $mitra->website,
        'Tahun Berdiri' => $mitra->established_year,
    ];

    $detailUsaha = [
        'Kategori' => $mitra->main_category,
        'Sub Kategori' => $mitra->sub_category,
        'Deskripsi' => $mitra->description,
        'Produk / Layanan' => $mitra->products_services,
        'Area Layanan' => $mitra->service_area,
        'Kapasitas Supply' => $mitra->supply_capacity,
        'Klien Utama' => $mitra->main_clients,
        'Sertifikasi' => $mitra->certifications,
    ];

    $waNumber = preg_replace('/^0/', '62', preg_replace('/\D/', '', $mitra->phone));
@endphp

@section('content')
    <div class="container-fluid py-3">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
            <div>
                <a href="{{ route('admin.mitra.index') }}" class="small text-decoration-none">&larr; Kembali ke daftar</a>
                <h4 class="mb-0 mt-1">{{ $mitra->company_name }}</h4>
                <small class="text-muted">{{ $mitra->registration_number }} · didaftarkan
                    {{ $mitra->created_at->translatedFormat('d M Y, H:i') }}</small>
            </div>
            <span class="badge fs-6 bg-{{ $mitra->status_color }}">{{ $mitra->status_label }}</span>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mb-3">{{ $errors->first() }}</div>
        @endif

        <div class="row g-3">
            {{-- Kolom kiri --}}
            <div class="col-lg-8">
                @foreach (['Informasi Perusahaan' => $infoPerusahaan, 'Detail Usaha' => $detailUsaha] as $judul => $rows)
                    <div class="card mb-3">
                        <div class="card-header bg-white fw-semibold">{{ $judul }}</div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                @foreach ($rows as $label => $value)
                                    <dt class="col-sm-4 fw-normal text-muted">{{ $label }}</dt>
                                    <dd class="col-sm-8">{{ $value ?: '-' }}</dd>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                @endforeach

                <div class="card">
                    <div class="card-header bg-white fw-semibold">Dokumen Pendukung</div>
                    <ul class="list-group list-group-flush">
                        @foreach ($documents as $field => $doc)
                            <li class="list-group-item d-flex justify-content-between align-items-center gap-2">
                                <div>
                                    {{ $doc['label'] }}
                                    @if ($doc['required'])
                                        <span class="text-danger">*</span>
                                    @endif
                                </div>
                                @if ($mitra->{$field})
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.mitra.document', [$mitra, $field]) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">Lihat</a>
                                        <a href="{{ route('admin.mitra.document', [$mitra, $field, 'download' => 1]) }}"
                                            class="btn btn-sm btn-light">Unduh</a>
                                    </div>
                                @else
                                    <small class="text-muted">Tidak diunggah</small>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Kolom kanan --}}
            <div class="col-lg-4">
                {{-- Kontak --}}
                <div class="card mb-3">
                    <div class="card-header bg-white fw-semibold">Kontak PIC</div>
                    <div class="card-body">
                        <div class="fw-semibold">{{ $mitra->pic_name }}</div>
                        <div class="small"><a href="mailto:{{ $mitra->email }}">{{ $mitra->email }}</a></div>
                        <div class="small mb-3">{{ $mitra->phone }}</div>
                        <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="btn btn-sm btn-success w-100">
                            Chat WhatsApp
                        </a>
                    </div>
                </div>

                {{-- Proses --}}
                <div class="card mb-3">
                    <div class="card-header bg-white fw-semibold">Proses Pendaftaran</div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            @foreach ($timeline as $step)
                                <li class="d-flex gap-2 mb-3">
                                    <span @class([
                                        'rounded-circle flex-shrink-0 mt-1',
                                        'bg-success' => $step['state'] === 'done',
                                        'bg-primary' => $step['state'] === 'current',
                                        'bg-secondary opacity-25' => $step['state'] === 'pending',
                                    ]) style="width:12px;height:12px"></span>
                                    <div>
                                        <div class="small fw-semibold">{{ $step['label'] }}</div>
                                        <small class="text-muted">
                                            {{ $step['date']?->translatedFormat('d M Y, H:i') ?? ($step['state'] === 'current' ? 'Sedang diproses' : 'Menunggu') }}
                                        </small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        @if ($mitra->admin_notes)
                            <div class="alert alert-secondary small mb-0">
                                <strong>Catatan:</strong> {{ $mitra->admin_notes }}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Aksi --}}
                @if ($actions)
                    <form action="{{ route('admin.mitra.status', $mitra) }}" method="POST" class="card mb-3">
                        @csrf
                        @method('PATCH')
                        <div class="card-header bg-white fw-semibold">Tindak Lanjut</div>
                        <div class="card-body">
                            <label class="form-label small">Catatan <span class="text-muted">(wajib jika
                                    ditolak)</span></label>
                            <textarea name="admin_notes" rows="3" class="form-control form-control-sm mb-3"
                                placeholder="Catatan untuk pendaftar">{{ old('admin_notes') }}</textarea>

                            <div class="d-grid gap-2">
                                @foreach ($actions as $value => $label)
                                    <button type="submit" name="action" value="{{ $value }}"
                                        class="btn btn-sm btn-{{ $value === MitraRegistration::STATUS_REJECTED ? 'outline-danger' : 'primary' }}"
                                        onclick="return confirm('Yakin: {{ $label }}?')">
                                        {{ $label }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </form>
                @endif

                {{-- Hapus --}}
                <form action="{{ route('admin.mitra.destroy', $mitra) }}" method="POST"
                    onsubmit="return confirm('Hapus pendaftaran ini beserta semua dokumennya? Tindakan ini tidak bisa dibatalkan.')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-link text-danger w-100">Hapus Pendaftaran</button>
                </form>
            </div>
        </div>
    </div>
@endsection
