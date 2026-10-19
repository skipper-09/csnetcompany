@extends('backend.layout.app')

@section('title', $page_name)

@section('content')
    <div class="container-fluid py-3">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
            <h4 class="mb-0">{{ $page_name }}</h4>
            <a href="{{ route('admin.mitra.export', request()->query()) }}" class="btn btn-outline-success btn-sm">
                Export CSV
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Statistik --}}
        <div class="row g-3 mb-3">
            <div class="col-6 col-lg">
                <a href="{{ route('admin.mitra.index') }}"
                    class="card h-100 text-decoration-none {{ empty($filter['status']) ? 'border-primary' : '' }}">
                    <div class="card-body py-3">
                        <div class="text-muted small">Total Pendaftar</div>
                        <div class="fs-4 fw-bold text-dark">{{ $total }}</div>
                    </div>
                </a>
            </div>
            @foreach ($statuses as $key => $label)
                <div class="col-6 col-lg">
                    <a href="{{ route('admin.mitra.index', ['status' => $key]) }}"
                        class="card h-100 text-decoration-none {{ ($filter['status'] ?? '') === $key ? 'border-primary' : '' }}">
                        <div class="card-body py-3">
                            <div class="text-muted small">{{ $label }}</div>
                            <div class="fs-4 fw-bold text-dark">{{ $stats[$key] ?? 0 }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- Filter --}}
        <form method="GET" class="card mb-3">
            <div class="card-body row g-2 align-items-end">
                <div class="col-lg-4">
                    <label class="form-label small mb-1">Cari</label>
                    <input type="text" name="q" value="{{ $filter['q'] ?? '' }}"
                        class="form-control form-control-sm" placeholder="No. pendaftaran, perusahaan, NPWP, email">
                </div>
                <div class="col-6 col-lg-2">
                    <label class="form-label small mb-1">Jenis</label>
                    <select name="type" class="form-select form-select-sm">
                        <option value="">Semua</option>
                        @foreach (\App\Models\MitraRegistration::TYPES as $type)
                            <option value="{{ $type }}" @selected(($filter['type'] ?? '') === $type)>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 col-lg-2">
                    <label class="form-label small mb-1">Status</label>
                    <select name="status" class="form-select form-select-sm">
                        <option value="">Semua</option>
                        @foreach ($statuses as $key => $label)
                            <option value="{{ $key }}" @selected(($filter['status'] ?? '') === $key)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 col-lg-1">
                    <label class="form-label small mb-1">Dari</label>
                    <input type="date" name="from" value="{{ $filter['from'] ?? '' }}"
                        class="form-control form-control-sm">
                </div>
                <div class="col-6 col-lg-1">
                    <label class="form-label small mb-1">Sampai</label>
                    <input type="date" name="to" value="{{ $filter['to'] ?? '' }}"
                        class="form-control form-control-sm">
                </div>
                <div class="col-lg-2 d-flex gap-2">
                    <button class="btn btn-primary btn-sm flex-fill">Filter</button>
                    <a href="{{ route('admin.mitra.index') }}" class="btn btn-light btn-sm">Reset</a>
                </div>
            </div>
        </form>

        {{-- Tabel --}}
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No. Pendaftaran</th>
                            <th>Perusahaan</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($registrations as $item)
                            <tr>
                                <td class="fw-semibold text-nowrap">{{ $item->registration_number }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $item->company_name }}</div>
                                    <small class="text-muted">{{ $item->pic_name }} · {{ $item->email }}</small>
                                </td>
                                <td>{{ $item->type_label }}</td>
                                <td>
                                    {{ $item->main_category }}
                                    <div><small class="text-muted">{{ $item->sub_category }}</small></div>
                                </td>
                                <td class="text-nowrap">{{ $item->created_at->translatedFormat('d M Y') }}</td>
                                <td><span class="badge bg-{{ $item->status_color }}">{{ $item->status_label }}</span></td>
                                <td class="text-end">
                                    <a href="{{ route('admin.mitra.show', $item) }}"
                                        class="btn btn-sm btn-outline-primary">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5">Belum ada data pendaftaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($registrations->hasPages())
                <div class="card-footer bg-white">{{ $registrations->links() }}</div>
            @endif
        </div>
    </div>
@endsection
