@extends('backend.layout.app')

@section('title', $page_name)

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="d-flex align-items-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">{{ $page_name }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Karir</li>
                    <li class="breadcrumb-item">{{ $page_name }}</li>
                </ol>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card px-4 py-4">
            <div class="row g-2 mb-4 align-items-center">
                <div class="col-md-auto">
                    <a href="{{ route('admin.karir.lamaran.create') }}" class="btn btn-sm btn-primary">
                        Tambah Lamaran
                    </a>
                </div>
                <div class="col-md-3 ms-md-auto">
                    <select id="filter-lowongan" class="form-select form-select-sm">
                        <option value="">Semua Lowongan</option>
                        @foreach ($lowongans as $l)
                            <option value="{{ $l->id }}">{{ $l->judul }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select id="filter-status" class="form-select form-select-sm">
                        <option value="">Semua Status</option>
                        @foreach ($statuses as $s)
                            <option value="{{ $s->value }}">{{ Str::headline($s->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-striped" id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Pelamar</th>
                            <th>Lowongan</th>
                            <th>Telepon</th>
                            <th>Status</th>
                            <th>Dikirim</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            const table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: {
                    url: '{{ route('admin.karir.lamaran.getData') }}',
                    data: function(d) {
                        d.lowongan_id = $('#filter-lowongan').val();
                        d.status = $('#filter-status').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        class: 'text-center'
                    },
                    {
                        data: 'kode',
                        name: 'kode'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'lowongan',
                        name: 'lowongan',
                        orderable: false
                    },
                    {
                        data: 'telepon',
                        name: 'telepon'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false
                    },
                    {
                        data: 'dikirim_at',
                        name: 'dikirim_at',
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#filter-lowongan, #filter-status').on('change', () => table.ajax.reload());

            $(document).on('click', '.btn-delete', function() {
                if (!confirm(`Hapus lamaran dari "${$(this).data('name')}"?`)) return;

                $.ajax({
                    url: $(this).data('url'),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    success: () => table.ajax.reload(null, false),
                    error: () => alert('Gagal menghapus lamaran.')
                });
            });
        });
    </script>
@endpush
