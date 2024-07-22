@extends('backend.layout.app')

@section('title',$page_name)

@push('css')

@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4 ">
    <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
      <h4 class="fw-bold">Edit {{$page_name}}</h4>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('backend.promo') }}">Promo</a></li>
        <li class="breadcrumb-item">Edit Promo</li>
      </ol>


    </div>
  </div>
  <!-- Striped Rows -->

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('backend.promo.update',['id'=>$promo->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Nama Promo</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="basic-default-fullname" placeholder="Nama Promo" value="{{$promo->name}}" />
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Status</label>
                  <select name="is_active" id="" class="form-control @error('is_active') is-invalid @enderror">
                    <option value="">Pilih Status</option>
                    <option value="1" {{$promo->is_active == 1 ? "selected" : ""}}>Aktif</option>
                    <option value="0" {{$promo->is_active == 0 ? "selected" : ""}}>Tidak Aktif</option>
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
                  <label class="form-label" for="basic-default-fullname">Logo</label>
                  <input type="file" id="file" name="logo" class="form-control @error('logo') is-invalid @enderror"
                    id="basic-default-fullname" />
                  <p class="text-primary">Kosongi bila tidak ingin merubah gambar</p>
                  @error('logo')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit {{$page_name}}</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>


@push('js')


@endpush

@endsection