@extends('backend.layout.app')

@section('title', 'Edit Lamaran')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="d-flex align-items-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">Edit Lamaran <small class="text-muted">{{ $lamaran->kode }}</small></h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.karir.lamaran.index') }}">{{ $page_name }}</a>
                    </li>
                    <li class="breadcrumb-item">Edit</li>
                </ol>
            </div>
        </div>

        <form action="{{ route('admin.karir.lamaran.update', $lamaran) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.karir.lamaran._form')
        </form>
    </div>
@endsection
