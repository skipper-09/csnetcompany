@extends('backend.layout.app')

@section('title', $page_name)

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4 ">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">{{ $page_name }}</h4>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('backend.media') }}">Media</a></li>
                    <li class="breadcrumb-item">Tambah {{ $page_name }}</li>
                </ol>


            </div>
        </div>
        <!-- Striped Rows -->

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('backend.media.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Judul</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            id="basic-default-fullname" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Konten</label>
                                        <select name="type" id="Typecontent"
                                            class="form-control @error('type') is-invalid @enderror">
                                            <option value="">Pilih Tipe Konten</option>
                                            <option value="pdf">PDF</option>
                                            <option value="vidio">VIDIO</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 d-none" id="vidio">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Url Vidio</label>
                                        <input type="text" name="url"
                                            class="form-control @error('url') is-invalid @enderror"
                                            id="basic-default-fullname" />
                                        @error('url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 d-none" id="pdf">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Input File</label>
                                        <input type="file" name="pdf"
                                            class="form-control hidden @error('pdf') is-invalid @enderror" id="filepdf" />
                                        @error('pdf')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 d-none" id="urldrive">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Input URL DRIVE</label>
                                        <input type="text" name="urldrive"
                                            class="form-control hidden @error('urldrive') is-invalid @enderror" id="filepdf" />
                                        @error('urldrive')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Tipe User</label>
                                        <select name="usertype" id=""
                                            class="form-control @error('usertype') is-invalid @enderror">
                                            <option value="">Pilih Tipe User</option>
                                            @foreach ($role as $s)
                                                <option value="{{ $s->name }}">{{ $s->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('usertype')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-primary">Tambah {{ $page_name }}</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @push('js')
        <script>
            $(document).on('change', '#Typecontent', function() {
                let val = $('#Typecontent option:selected').val();
                if (val == 'pdf') {
                    $('#pdf').removeClass('d-none');
                    $('#urldrive').removeClass('d-none');
                    $('#vidio').addClass('d-none');
                } else if (val == 'vidio') {
                    $('#vidio').removeClass('d-none');
                    $('#pdf').addClass('d-none');
                    $('#urldrive').addClass('d-none');
                } else {
                    $('#pdf').addClass('d-none');
                    $('#vidio').addClass('d-none');
                    $('#urldrive').addClass('d-none');
                }

            })
        </script>
    @endpush

@endsection
