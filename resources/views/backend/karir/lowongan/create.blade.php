@extends('backend.layout.app')

@section('title', 'Tambah ' . $page_name)

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="d-flex align-items-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">Tambah {{ $page_name }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.karir.lowongan.index') }}">{{ $page_name }}</a>
                    </li>
                    <li class="breadcrumb-item">Tambah</li>
                </ol>
            </div>
        </div>

        <form action="{{ route('admin.karir.lowongan.store') }}" method="POST">
            @csrf
            @include('backend.karir.lowongan._form')
        </form>
    </div>
@endsection
