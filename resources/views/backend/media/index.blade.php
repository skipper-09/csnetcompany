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
            <div class="mb-4">
                <a href="{{ route('backend.add.media') }}" class="btn btn-sm btn-primary">Tambah {{ $page_name }}</a>
            </div>
            <div class="row">
                @foreach ($media as $item)
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->name }}</h4>
                            <a href="{{ route('backend.media.detail', ['slug'=>$item->slug]) }}"><button class="btn btn-sm btn-primary">{{ $item->type == 'pdf' ? 'Baca Selengkapnya' : 'Lihat Vidio' }}</button></a>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>

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

@endpush
