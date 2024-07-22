@extends('backend.layout.app')

@section('title',$page_name)

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4 ">
    <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
      <h4 class="fw-bold">{{$page_name}}</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('backend.packet') }}">Daftar Paket</a></li>
        <li class="breadcrumb-item">Edit Deskripsi Paket</li>
      </ol>
    </div>
  </div>
  <!-- Striped Rows -->

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('backend.deskription.update',['id'=>$deskripsi->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Deskripsi Paket</label>
                  <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                    id="basic-default-fullname" placeholder="Nama Paket" value="{{$deskripsi->name}}" />
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
                    <option value="{{ $s->id }}" {{$s->id == $deskripsi->packet_id ? "selected" : ""}} >{{ $s->name }}
                    </option>
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
                  <input type="file" name="logo" class="form-control  @error('logo') is-invalid @enderror"
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
            <button type="submit" class="btn btn-primary">{{$page_name}}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection