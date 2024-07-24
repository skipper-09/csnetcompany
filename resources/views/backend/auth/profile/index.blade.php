@extends('backend.layout.app')

@section('title',$page_name)

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

  <!-- Striped Rows -->

  <div class="row">
    <div class="col-md-6">

      <div class="card mb-4">
        <div class="card-body">
          <h4 class="fw-bold">Update {{$page_name}}</h4>
          <form action="{{ route('backend.profile.update',['id'=>$profile->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Nama</label>
                  <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                    id="basic-default-fullname" value="{{$profile->name}}" />
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Email</label>
                  <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror"
                    id="basic-default-fullname" value="{{$profile->email}}" />
                  @error('email')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Password</label>
                  <input type="text" name="password" class="form-control  @error('password') is-invalid @enderror"
                    id="basic-default-fullname" placeholder="Kosong Untuk Tidak Merubah" />
                  @error('password')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Konfirmasi Password</label>
                  <input type="text" name="password" class="form-control  @error('password') is-invalid @enderror"
                    id="basic-default-fullname" placeholder="Konfirmasi Password" />
                  @error('password')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              {{-- <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Image</label>
                  <input type="file" name="logo" class="form-control  @error('logo') is-invalid @enderror"
                    id="basic-default-fullname" />
                  <p class="text-primary">Kosongi bila tidak ingin merubah gambar</p>
                  @error('logo')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div> --}}
            </div>
            <button type="submit" class="btn btn-primary">Update {{$page_name}}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection