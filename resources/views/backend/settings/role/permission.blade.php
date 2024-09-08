@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4 ">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">{{ $page_name }}</h4>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">{{ $page_name }}</li>
                </ol>


            </div>
        </div>
        <!-- Striped Rows -->
        <div class="card px-4 py-4">
            <form action="{{ route('backend.role.update.permission') }}" method="post">
                @csrf
                @method('PUT')

                <div class="row gy-4">
                    <div class="col-md-12 text-center mb-5">
                        <div class="checkbox">
                            <input type="checkbox" class="form-check-input" id="uid">
                            <label class="form-check-label" for="uid">Semua Permission</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row pl-4 pr-4">
                            @foreach ($permissions as $idx => $permission)
                                @if (Auth::user()->roles[0]['name'] == 'Developer')
                                    <div class="col-md-3 col-sm-6" style="margin-bottom: 40px">
                                        @foreach ($permission as $singlePermission)
                                            <div class="checkbox mb-3" dir="ltr">

                                                <input type="checkbox" class="uid form-check-input"
                                                    id="uid-{{ $idx . '-' . $loop->iteration }}" name="permission[]"
                                                    value="{{ $singlePermission }}"
                                                    {{ $role->hasPermissionTo($singlePermission) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="uid-{{ $idx . '-' . $loop->iteration }}">{{ $singlePermission }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    @if (Auth::user()->roles[0]['name'] !== 'Developer' && $permission[0] !== 'change-permissions')
                                        <div class="col-md-3 col-sm-6" style="margin-bottom: 10px">
                                            @foreach ($permission as $singlePermission)
                                                <div class="checkbox mb-3" dir="ltr">
                                                    <input type="checkbox" class="uid form-check-input"
                                                        id="uid-{{ $idx . '-' . $loop->iteration }}" name="permission[]"
                                                        value="{{ $singlePermission }}"
                                                        {{ isset($role) && $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="uid-{{ $idx . '-' . $loop->iteration }}">{{ $singlePermission }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr class="preview-hr">
                <button class="btn btn-info float-end mx-1" type="button" data-toggle="ajax"
                    data-target="{{ route('backend.role') }}"><i class="fa fa-arrow-left"></i> Kembali</button>
                <button class="btn btn-primary float-end" type="submit"><i class="fa fa-paper-plane"></i> Submit</button>
            </form>

        </div>
        <!--/ Striped Rows -->
    </div>
@endsection


@push('js')
@endpush
