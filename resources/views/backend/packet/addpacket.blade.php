@extends('backend.layout.app')

@section('title',$page_name)

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
          <form>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">NAMA PAKET</label>
                      <input type="text" class="form-control" id="basic-default-fullname" placeholder="Nama Paket" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">HARGA PAKET</label>
                      <input type="text"  class="form-control" id="basic-default-fullname" placeholder="Harga Paket" />
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Daftar Paket</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection