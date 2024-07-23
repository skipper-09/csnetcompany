@extends('backend.layout.app')

@section('title',$page_name)

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4 ">
    <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
      <h4 class="fw-bold">{{$page_name}}</h4>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('backend.area') }}">Area</a></li>
        <li class="breadcrumb-item">Tambah Area</li>
      </ol>


    </div>
  </div>
  <!-- Striped Rows -->

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('backend.area.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Nama Area</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="basic-default-fullname" value="{{old('name')}}" />
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
                    id="basic-default-fullname" value="{{old('kode_pos')}}" />
                  @error('kode_pos')
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


@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
  Dropzone.options.fileDropzone = {
                maxFilesize: 2, // MB
                acceptedFiles: ".jpeg,.jpg,.png",
                success: function(file, response) {
                    console.log(response);
                },
                error: function(file, response) {
                    console.log(response);
                }
            };
</script>
@endpush

@endsection