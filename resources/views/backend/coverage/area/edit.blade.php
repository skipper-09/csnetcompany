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
        <li class="breadcrumb-item active"><a href="{{ route('backend.area') }}">Area</a></li>
        <li class="breadcrumb-item">Edit Area</li>
      </ol>


    </div>
  </div>
  <!-- Striped Rows -->

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('backend.area.update',['id'=>$area->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Nama Area</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                     value="{{$area->name}}" />
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Kode Pos</label>
                  <input type="number" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror"
                    id="basic-default-fullname" value="{{$area->kode_pos}}" />
                  @error('kode_pos')
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