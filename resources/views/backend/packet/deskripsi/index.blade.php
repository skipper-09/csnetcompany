@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
@endpush
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4 ">
        <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
            <h4 class="fw-bold">{{ $page_name }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend.packet') }}">Paket</a></li>
                <li class="breadcrumb-item active">{{ $page_name }}</li>
            </ol>
        </div>
    </div>
    <!-- Striped Rows -->
    <div class="card px-4 py-4">
        <div class="mb-4">
            <a href="{{ route('backend.add.deskription', ['id'=>$id]) }}" class="btn btn-sm btn-primary">Tambah {{
                $page_name }}</a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class=" table table-striped " id="dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        {{-- <th>Logo</th> --}}
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
       
        let id = new URLSearchParams(window.location.search).get('id');
        let url = '{{ route('backend.deskription.getData', ':id') }}';
        url = url.replace(':id', id);
        $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: url,
                columns: [
                    // {
                    //       data: 'DT_RowIndex',
                    //       orderable: false,
                    //       searchable: false,
                    //       class:'text-center'
                    //   },
                    {
                        data: 'name',
                        name: 'name'
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