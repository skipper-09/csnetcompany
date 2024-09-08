@extends('backend.layout.app')

@section('title', $page_name)

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4 ">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">{{ $page_name }}</h4>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('backend.role') }}">Role</a></li>
                    <li class="breadcrumb-item">Edit {{ $page_name }}</li>
                </ol>
            </div>
        </div>
        <!-- Striped Rows -->

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('backend.role.update', ['id' => $role->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Role Name</label>
                                <input type="text" name="name" value="{{ $role->name }}"
                                    class="form-control @error('name') is-invalid @enderror" id="basic-default-fullname" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <h3>Permissions</h3>

                                <div class="gap-3 d-flex align-content-start justify-content-start mb-2">
                                    <button type="button" class="btn btn-sm btn-primary" id="select-all">Select
                                        All</button>
                                    <button type="button" class="btn btn-sm btn-primary" id="deselect-all">Deselect
                                        All</button>
                                </div>

                                @foreach ($permissions as $permission)
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                            class="permission-checkbox form-check-input"
                                            {{ isset($role) && $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Edit {{ $page_name }}</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('js')
        <script>
            $(document).ready(function() {
                // Select all checkboxes
                $('#select-all').click(function() {
                    $('.permission-checkbox').prop('checked', true);
                });

                // Deselect all checkboxes
                $('#deselect-all').click(function() {
                    $('.permission-checkbox').prop('checked', false);
                });
            });
        </script>
    @endpush
@endsection
