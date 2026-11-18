@extends('backend.layout.app')

@section('title', $page_name)

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="d-flex align-items-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">Edit {{ $page_name }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('backend.settings') }}">{{ $page_name }}</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>

        <div class="card px-4 py-4">
            <form action="{{ route('backend.settings.update', $setting->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('backend.settings.settings._form')
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('backend.settings') }}" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
