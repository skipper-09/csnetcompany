@extends('backend.layout.app')

@section('title',$page_name)

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<style>
  .dropzone {
    border: 2px dashed #0087F7;
    border-radius: 5px;
    background: white;
    padding: 20px;
  }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4 ">
    <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
      <h4 class="fw-bold">{{$page_name}}</h4>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('backend.packet') }}">Daftar Paket</a></li>
        <li class="breadcrumb-item">Tambah Daftar Paket</li>
      </ol>


    </div>
  </div>
  <!-- Striped Rows -->

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('backend.deskription.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Deskripsi Paket</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="basic-default-fullname" placeholder="Deskripsi Paket" />
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">PAKET</label>
                  <select name="packet_id" id="" class="form-control @error('packet_id') is-invalid @enderror">
                    <option value="">Pilih Paket</option>
                    @foreach ($paket as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                  </select>
                  @error('packet_id')
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
                  @error('logo')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">{{$page_name}}</button>
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