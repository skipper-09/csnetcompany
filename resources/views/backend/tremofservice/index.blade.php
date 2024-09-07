@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
<style>
    .sorting_1{
        overflow:auto;
        width: 10px !important;
    }
</style>
@endpush
@section('content')



<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4 ">
    <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
      <h4 class="fw-bold">{{ $page_name }}</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">{{ $page_name }}</li>
      </ol>
    </div>
  </div>
  <!-- Striped Rows -->
  <div class="card px-4 py-4">
    {{-- <div class="mb-4">
      <a href="{{ route('backend.add.promo') }}" class="btn btn-sm btn-primary">Tambah {{ $page_name }}</a>
    </div> --}}
    <div class="table-responsive text-nowrap">
      <table class=" table table-striped " id="dataTable" style="width:100%">
        <thead>
          <tr>
            <th>Detail</th>
            @can('update-tremofservice')
            <th>Actions</th>
            @endcan
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!--/ Striped Rows -->
</div>
@endsection


@push('js')
<script src="{{ asset('backend/js/ui-toasts.js') }}"></script>

<script>
  $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('backend.tremofservice.getData') }}',
                columns: [
                    // {
                    //       data: 'DT_RowIndex',
                    //       orderable: false,
                    //       searchable: false,
                    //       class:'text-center'
                    //   },
                    {
                        data: 'tremofservice',
                        name: 'tremofservice',
                        width: '100px'
                    },
                    @can('update-tremofservice')
                    {
                        data: 'action',
                        name: 'action'
                    }
                    @endcan
                ]
            });

        });
</script>
@endpush