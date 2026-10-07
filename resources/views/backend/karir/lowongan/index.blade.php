@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">{{ $page_name }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Karir</li>
                    <li class="breadcrumb-item">{{ $page_name }}</li>
                </ol>
            </div>
        </div>

        <div class="card px-4 py-4">
            <div class="mb-4">
                <a href="{{ route('admin.karir.lowongan.create') }}" class="btn btn-sm btn-primary">
                    Tambah {{ $page_name }}
                </a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-striped" id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lowongan</th>
                            <th>Lokasi</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th class="text-center">Pelamar</th>
                            <th>Ditutup</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('backend/js/ui-toasts.js') }}"></script>

    <script>
        $(document).ready(function() {
            const table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: '{{ route('admin.karir.lowongan.getData') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        class: 'text-center'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'lokasi',
                        name: 'lokasi'
                    },
                    {
                        data: 'tipe_kerja',
                        name: 'tipe_kerja'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'lamarans_count',
                        name: 'lamarans_count',
                        searchable: false,
                        class: 'text-center'
                    },
                    {
                        data: 'ditutup_at',
                        name: 'ditutup_at',
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

            // Hapus via AJAX
            $(document).on('click', '.btn-delete', function() {
                const url = $(this).data('url');
                const name = $(this).data('name');

                if (!confirm(`Hapus lowongan "${name}"?`)) return;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    success: function() {
                        table.ajax.reload(null, false);
                    },
                    error: function() {
                        alert('Gagal menghapus lowongan.');
                    }
                });
            });
        });
    </script>
@endpush
