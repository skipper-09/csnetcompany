@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="d-flex align-items-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">{{ $page_name }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $page_name }}</li>
                </ol>
            </div>
        </div>
        <div class="card px-4 py-4">
            @can('create-spk')
                <div class="mb-4">
                    <a href="{{ route('backend.spk.add') }}" class="btn btn-sm btn-primary">Tambah {{ $page_name }}</a>
                </div>
            @endcan
            <div class="table-responsive text-nowrap">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Tanggal Install</th>
                            <th>Nama Klien</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>SPK</th>
                            @can('delete-spk')
                            <th>Actions</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody></tbody>
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
            ajax: '{{ route('backend.spk.getData') }}',
            columns: [{
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'date_install',
                    name: 'date_install'
                },
                {
                    data: 'client_name',
                    name: 'client_name'
                },
                {
                    data: 'client_address',
                    name: 'client_address'
                },
                {
                    data: 'client_whatsapp',
                    name: 'client_whatsapp'
                },
                {
                    data: 'pdf_path',
                    name: 'pdf_path',
                    orderable: false,
                    searchable: false
                },
                @can('delete-spk')
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                @endcan
            ],
        });
    });
</script>
@endpush
