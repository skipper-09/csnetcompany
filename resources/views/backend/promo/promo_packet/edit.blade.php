@extends('backend.layout.app')

@section('title', $page_name)

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4 ">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">{{ $page_name }}</h4>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('backend.promo_paket') }}">Promo Paket</a></li>
                    <li class="breadcrumb-item">Edit {{$page_name}}</li>
                </ol>


            </div>
        </div>
        <!-- Striped Rows -->

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('backend.promo_paket.update',['id'=>$promopaket->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Promo</label>
                                        <select name="promotion_id" id=""
                                            class="form-control @error('promotion_id') is-invalid @enderror">
                                            <option value="">Pilih Promo</option>
                                            @foreach ($promo as $s)
                                                <option value="{{ $s->id }}" {{$s->id == $promopaket->promotion_id ? "selected" : " "}}>{{ $s->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('promotion_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Paket</label>
                                        <select name="packet_id" id=""
                                            class="form-control @error('packet_id') is-invalid @enderror">
                                            <option value="">Pilih Paket</option>
                                            @foreach ($paket as $s)
                                                <option value="{{ $s->id }}" {{$s->id == $promopaket->packet_id ? "selected" : " "}}>{{ $s->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('packet_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Tipe Diskon</label>
                                        <select name="discount_type" id=""
                                            class="form-control @error('discount_type') is-invalid @enderror">
                                            <option value="">Pilih Tipe Diskon</option>
                                            <option value="percent" {{$promopaket->discount_type == "percent" ? "selected" : ""}}>Persen %</option>
                                            <option value="fixed_amount" {{$promopaket->discount_type == "fixed_amount" ? "selected" : ""}}>Nominal</option>
                                        </select>
                                        @error('discount_type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Total DIskon</label>
                                        <input type="number" name="discount_amount"
                                            class="form-control @error('discount_amount') is-invalid @enderror"
                                            id="basic-default-fullname" value="{{$promopaket->discount_amount}}" />
                                        @error('discount_amount')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Status</label>
                                        <select name="status" id=""
                                            class="form-control @error('status') is-invalid @enderror">
                                            <option value="">Pilih Status</option>
                                            <option value="1" {{$promopaket->status == 1 ? "selected" : ""}}>Aktif</option>
                                            <option value="0" {{$promopaket->status == 0 ? "selected" : ""}}>TIdak Aktif</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit {{ $page_name }}</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
