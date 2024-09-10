@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
@endpush
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4 ">
    <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
      <h4 class="fw-bold">{{$page_name}}</h4>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">{{$page_name}}</li>
      </ol>


    </div>
  </div>
  <!-- Striped Rows -->
  <div class="card px-4 py-4">
    @can('read-locationjob')
    <div class="mb-4">
      <a href="{{ route('backend.add.hiring') }}" class="btn btn-sm btn-primary">Tambah {{$page_name}}</a>
    </div>
    @endcan
    <div class="table-responsive text-nowrap">
      <table class=" table table-striped " id="dataTable" style="width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            @canany(['update-locationjob','delete-locationjob'])
            <th>Actions</th>
            @endcanany
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
                    ajax: '{{ route('backend.hiring.getData') }}',
                    columns: [
                        {
                            data: 'name',
                            name: 'name'
                        },
                       
                        {
                            data: 'category',
                            name: 'category'
                        },
                        {
                            data: 'joblocation',
                            name: 'joblocation'
                        },
                        @canany(['update-locationjob','delete-locationjob'])
                        {
                            data: 'action',
                            name: 'action'
                        }
                        @endcanany
                      
                    ]
                });
    
            });

</script>

@endpush