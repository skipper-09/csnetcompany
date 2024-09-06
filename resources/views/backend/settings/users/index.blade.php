@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4 ">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">User</h4>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Setting</li>
                    <li class="breadcrumb-item">Home</li>
                </ol>


            </div>
        </div>
        <!-- Striped Rows -->
        <div class="card px-4 py-4">
            <div class="mb-4">
                <a href="{{ route('backend.add.users') }}" class="btn btn-sm btn-primary">Tambah {{ $page_name }}</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class=" table table-striped " id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th> 
                            <th>Role</th> 
                            <th>Actions</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {

            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('backend.users.getData') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        class: 'text-center'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'roles',
                        name: 'roles'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }

                ]
            });

        });
    </script>
@endpush
