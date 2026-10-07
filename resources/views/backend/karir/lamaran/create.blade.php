@extends('backend.layout.app')

@section('title', 'Tambah Lamaran')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="d-flex align-items-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">Tambah Lamaran</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.karir.lamaran.index') }}">{{ $page_name }}</a>
                    </li>
                    <li class="breadcrumb-item">Tambah</li>
                </ol>
            </div>
        </div>

        <form action="{{ route('admin.karir.lamaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.karir.lamaran._form')
        </form>
    </div>
@endsection
