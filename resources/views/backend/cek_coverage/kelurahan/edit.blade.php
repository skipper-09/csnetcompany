@extends('backend.layout.app')

@section('title', $page_name)


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4 ">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">{{ $page_name }}</h4>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('backend.kota') }}">Kota</a></li>
                    <li class="breadcrumb-item">Edit {{ $page_name }}</li>
                </ol>


            </div>
        </div>
        <!-- Striped Rows -->

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('backend.kelurahan.update',['id'=>$kelurahan->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Kecamatan</label>
                                        <select name="kecamatan_id" id=""
                                            class="form-control js-example-basic-single @error('kecamatan_id') is-invalid @enderror">
                                            <option value="">Pilih kecamatan</option>
                                            @foreach ($kecamatan as $s)
                                                <option value="{{ $s->id }}"  {{$s->id == $kelurahan->kecamatan_id ? "selected" : ""}}>{{ $s->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('kecamatan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Nama Kelurahan</label>
                                        <input type="text" name="name" value="{{$kelurahan->name}}"
                                            class="form-control @error('name') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Nama kelurahan" />
                                        @error('name')
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
