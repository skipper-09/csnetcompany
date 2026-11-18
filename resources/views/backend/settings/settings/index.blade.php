@extends('backend.layout.app')

@section('title', $page_name)

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
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @can('create-settings')
                <div class="mb-4">
                    <a href="{{ route('backend.add.settings') }}" class="btn btn-sm btn-primary">Tambah {{ $page_name }}</a>
                </div>
            @endcan

            <div class="table-responsive text-nowrap">
                <table class="table table-striped" id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Grup</th>
                            <th>Key</th>
                            <th>Label</th>
                            <th>Tipe</th>
                            <th>Nilai</th>
                            @canany(['update-settings', 'delete-settings'])
                                <th>Actions</th>
                            @endcanany
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
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: '{{ route('backend.settings.getData') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        class: 'text-center'
                    },
                    {
                        data: 'group',
                        name: 'group'
                    },
                    {
                        data: 'key',
                        name: 'key'
                    },
                    {
                        data: 'label',
                        name: 'label'
                    },
                    {
                        data: 'type_label',
                        name: 'type',
                        searchable: false
                    },
                    {
                        data: 'value_display',
                        orderable: false,
                        searchable: false
                    },
                    @canany(['update-settings', 'delete-settings'])
                        {
                            data: 'action',
                            orderable: false,
                            searchable: false
                        }
                    @endcanany
                ]
            });
        });
    </script>
@endpush
