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
            @can('create-promopaket')
            <div class="mb-4">
                <a href="{{ route('backend.add.promo_paket') }}" class="btn btn-sm btn-primary">Tambah
                    {{ $page_name }}</a>
            </div>
            @endcan
            <div class="table-responsive text-nowrap">
                <table class=" table table-striped " id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Promo</th>
                            <th>Nama Paket</th>
                            <th>Tipe Diskon</th>
                            <th>jumlah DIskon</th>
                            <th>Harga</th>
                            <th>Status</th>
                            @canany(['update-promopaket','delete-promopaket'])
                                
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
    <script src="{{ asset('backend/js/ui-toasts.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('backend.promo_paket.getData') }}',
                columns: [
                    // {
                    //       data: 'DT_RowIndex',
                    //       orderable: false,
                    //       searchable: false,
                    //       class:'text-center'
                    //   },
                    {
                        data: 'promotion_id',
                        name: 'promotion_id'
                    },
                    {
                        data: 'packet_id',
                        name: 'packet_id'
                    },
                    {
                        data: 'discount_type',
                        name: 'discount_type',
                    },
                    {
                        data: 'discount_amount',
                        name: 'discount_amount',
                    },
                    {
                        data: 'discounted_price',
                        name: 'discounted_price',
                    },

                    {
                        data: 'status',
                        name: 'status'
                    },
                    @canany(['update-promopaket','delete-promopaket'])
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
