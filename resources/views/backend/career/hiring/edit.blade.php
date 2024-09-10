@extends('backend.layout.app')

@section('title', $page_name)

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4 ">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">{{ $page_name }}</h4>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('backend.hiring') }}">Pekerjaan</a></li>
                    <li class="breadcrumb-item">Edit {{ $page_name }}</li>
                </ol>
            </div>
        </div>
        <!-- Striped Rows -->

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('backend.hiring.update',['id'=>$hiring->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">NAMA Pekerjaan</label>
                                        <input type="text" name="name" value="{{ $hiring->name }}"
                                            class="form-control @error('name') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Nama Pekerjaan" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                               
                               
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Kategori</label>
                                        <select name="category_job" id=""
                                            class="form-control @error('category_job') is-invalid @enderror">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categori as $s)
                                                <option value="{{ $s->id }}" {{ $s->id == $hiring->category_job ? "selected" : "" }}>{{ $s->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_job')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Lokasi</label>
                                        <select name="job_location" 
                                            class="form-control @error('job_location') is-invalid @enderror">
                                            <option value="">Pilih Lokasi</option>
                                            @foreach ($location as $s)
                                                <option value="{{ $s->id }}" {{ $s->id == $hiring->job_location ? 'selected' : '' }}>{{ $s->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('job_location')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                                        <textarea name="qualification" id="editor" class="editor  @error('qualification') is-invalid @enderror">{{ $hiring->qualification }}</textarea>
                                        @error('qualification')
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
