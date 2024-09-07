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
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">{{ $page_name }}</li>
                </ol>
            </div>
        </div>
        <!-- Striped Rows -->
        <div class="card px-4 py-4">
            @can('create-media')
            <div class="mb-4">
                <a href="{{ route('backend.add.media') }}" class="btn btn-sm btn-primary">Tambah {{ $page_name }}</a>
            </div>
            @endcan
            @canany(['update-media','delete-media'])
            <div class="table-responsive text-nowrap">
                <table class=" table table-striped " id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tipe</th>
                            @canany(['update-media','delete-media'])
                            <th>User</th>
                            <th>Actions</th>
                            @endcanany
                        </tr>
                    </thead>
                </table>
            </div>
            @endcanany
            @if (!Auth::user()->hasrole(['Administrator','Developer']))
            <div class="row">
                @foreach ($media as $item)
                    <div class="col-12 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $item->name }}</h4>
                                <a href="{{ route('backend.media.detail', ['slug' => $item->slug]) }}"><button
                                        class="btn btn-sm btn-primary">{{ $item->type == 'pdf' ? 'Baca Selengkapnya' : 'Lihat Vidio' }}</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

            {{-- <div>
                <button class="btn btn-sm btn-primary" id="prev">Previous</button>
                <button class="btn btn-sm btn-primary" id="next">Next</button>
                &nbsp; &nbsp;
                <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
              </div>
              
              <canvas id="the-canvas"></canvas>
        </div> --}}
            <!--/ Striped Rows -->
        </div>
    @endsection


    @push('js')
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('backend.media.getData') }}',
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
                            data: 'type',
                            name: 'type'
                        },
                        @canany(['update-media','delete-media'])
                        {
                            data: 'usertype',
                            name: 'usertype'
                        },

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
