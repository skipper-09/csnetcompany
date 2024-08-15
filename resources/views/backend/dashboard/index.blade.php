@extends('backend.layout.app')

@section('title',$page_name);

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-center row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Welcome {{Auth::user()->name}}! 🎉</h5>
              {{-- <p class="mb-4">
                You have done <span class="fw-medium">72%</span> more sales today. Check your new badge in
                your profile.
              </p> --}}


            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="{{ asset('backend/img/illustrations/man-with-laptop-light.png') }}" height="140"
                alt="View Badge User" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 order-1">
      <a href="{{ route('backend.packet')}}">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="{{ asset('backend/img/icons/unicons/package.png') }}" alt="chart success"
                class="rounded" />
            </div>
          </div>
          <span class="fw-medium d-block mb-1">JUMLAH PAKET</span>
          <h3 class="card-title mb-2">{{count($paket)}}</h3>
        </div>
      </div>
    </a>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 order-1">
      <a href="{{ route('backend.promo')}}">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="{{ asset('backend/img/icons/unicons/coupon.png') }}" alt="chart success"
                class="rounded" />
            </div>
          </div>
          <span class="fw-medium d-block mb-1">JUMLAH PROMO</span>
          <h3 class="card-title mb-2">{{count($promo)}}</h3>
        </div>
      </div>
    </a>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 order-1">
      <a href="{{ route('backend.odp')}}">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="{{ asset('backend/img/icons/unicons/odp-file.png') }}" alt="chart success"
                class="rounded" />
            </div>
           
          </div>
          <span class="fw-medium d-block mb-1">JUMLAH ODP</span>
          <h3 class="card-title mb-2">{{count($odp)}}</h3>
         
        </div>
      </div>
      </a>
    </div>
   
  </div>

</div>
@endsection