@extends('backend.layout.app')

@section('title',$page_name)

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4 ">
    <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
      <h4 class="fw-bold">{{$page_name}}</h4>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Tambah {{$page_name}}</li>
      </ol>


    </div>
  </div>
  <!-- Striped Rows -->

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('backend.faq.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Pertanyaan</label>
                  <input type="text" name="question" class="form-control @error('question') is-invalid @enderror"
                    id="basic-default-fullname" placeholder="Pertanyaan" />
                  @error('question')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-12 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Jawaban</label>
                  <textarea name="answer" id="editor" class="editor  @error('answer') is-invalid @enderror" placeholder="Jawaban"></textarea>
                  @error('answer')
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
</div>

@endsection