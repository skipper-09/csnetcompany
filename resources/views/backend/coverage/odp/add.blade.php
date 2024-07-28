@extends('backend.layout.app')

@section('title',$page_name)

@push('css')
    
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4 ">
    <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
      <h4 class="fw-bold">{{$page_name}}</h4>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('backend.odp') }}">Data Odp</a></li>
        <li class="breadcrumb-item">Tambah {{$page_name}}</li>
      </ol>


    </div>
  </div>
  <!-- Striped Rows -->

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('backend.odp.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">NAMA Odp</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="basic-default-fullname" placeholder="Nama ODP" />
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">SPLITTER</label>
                  <input type="number" name="splitter" class="form-control @error('splitter') is-invalid @enderror"
                    id="basic-default-fullname" />
                  @error('splitter')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">latitude</label>
                  <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror"
                    id="basic-default-fullname" />
                  @error('latitude')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">longitude</label>
                  <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror"
                    id="basic-default-fullname" />
                  @error('longitude')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Area Odp</label>
                  <select name="area_id" id="" class="form-control js-example-basic-single @error('area_id') is-invalid @enderror">
                    <option value="">Pilih Area</option>
                    @foreach ($area as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                  </select>
                  @error('area_id')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah {{$page_name}}</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection