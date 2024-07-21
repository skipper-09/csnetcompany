@extends('backend.layout.app')

@section('title',$page_name)

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4 ">
    <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
      <h4 class="fw-bold">{{$page_name}}</h4>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('backend.packet') }}">Daftar Paket</a></li>
        <li class="breadcrumb-item">{{$page_name}}</li>
      </ol>


    </div>
  </div>
  <!-- Striped Rows -->

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('backend.packet.update',['id'=>$paket->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">NAMA PAKET</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="basic-default-fullname" placeholder="Nama Paket" value="{{$paket->name}}" />
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">HARGA PAKET</label>
                  <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                    id="basic-default-fullname" placeholder="Harga Paket" value="{{$paket->price}}" />
                  @error('price')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">KATEGORI PAKET</label>
                  <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categorypacket as $s)
                    <option value="{{ $s->id }}" {{$s->id == $paket->category_id ? "selected" : " "}}>{{ $s->name }}
                    </option>
                    @endforeach
                  </select>
                  @error('category_id')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Status PAKET</label>
                  <select name="is_active" id="" class="form-control @error('is_active') is-invalid @enderror">
                    <option value="">Pilih Status</option>
                    <option value="1" {{$paket->is_active == 1 ? "selected" : ""}}>Aktif</option>
                    <option value="0" {{$paket->is_active == 0 ? "selected" : ""}}>TIdak Aktif</option>
                  </select>
                  @error('is_active')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Durasi PAKET</label>
                  <select name="duration" id="" class="form-control">
                    <option value="Bulan" {{$paket->duration == "Bulan" ? "selected" : ""}}>Bulan</option>
                    <option value="Tahun" {{$paket->duration == "Tahun" ? "selected" : ""}}>Tahun</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Best Seller</label>
                  <select name="best_seller" id="" class="form-control">
                    <option value="0" {{$paket->best_seller == 0 ? "selected" : ""}}>Tidak</option>
                    <option value="1" {{$paket->best_seller == 1 ? "selected" : ""}}>Ya</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit Daftar Paket</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection