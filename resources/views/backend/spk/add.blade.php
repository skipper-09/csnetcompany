@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4 ">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">Buat {{ $page_name }}</h4>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('backend.spk') }}">Surat Tugas Pemasangan Retail</a>
                    </li>
                    <li class="breadcrumb-item">Buat Surat Tugas Pemasangan Retail</li>
                </ol>
            </div>
        </div>
        <!-- Striped Rows -->

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('backend.spk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Date</label>
                                        <input type="date" name="date"
                                            class="form-control @error('date') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Tanggal" />
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Nama Teknisi</label>
                                        <input type="text" name="technician_name"
                                            class="form-control @error('technician_name') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan Nama Teknisi" />
                                        @error('technician_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Posisi Teknisi</label>
                                        <input type="text" name="technician_position"
                                            class="form-control @error('technician_position') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan Nama Teknisi" />
                                        @error('technician_position')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <h5 class="fw-bold">Informasi Klien</h5>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Nama Klien</label>
                                        <input type="text" name="client_name"
                                            class="form-control @error('client_name') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan Nama Client" />
                                        @error('client_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">NIK</label>
                                        <input type="text" name="client_nik"
                                            class="form-control @error('client_nik') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan NIK" />
                                        @error('client_nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Alamat</label>
                                        <input type="text" name="client_address"
                                            class="form-control @error('client_address') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan Alamat" />
                                        @error('client_address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">No Whatsapp</label>
                                        <input type="text" name="client_whatsapp"
                                            class="form-control @error('client_whatsapp') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan No Telepon" />
                                        @error('client_whatsapp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Paket</label>
                                        <input type="text" name="package"
                                            class="form-control @error('package') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan Nama Paket" />
                                        @error('package')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <h5 class="fw-bold">Instalasi Detail</h5>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">No Serial Modem</label>
                                        <input type="text" name="modem_serial"
                                            class="form-control @error('modem_serial') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan No Serial Modem" />
                                        @error('modem_serial')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Kabel Detail</label>
                                        <input type="text" name="cable_details"
                                            class="form-control @error('cable_details') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan Kabel Detail" />
                                        @error('cable_details')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">STB Status</label>
                                        <select name="stb_status" id=""
                                            class="form-control @error('stb_status') is-invalid @enderror">
                                            <option selected>Pilih Status</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                        @error('stb_status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">STB Status</label>
                                        <input type="text" name="stb_status"
                                            class="form-control @error('stb_status') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan Nama Paket" />
                                        @error('stb_status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">STB MAC Address</label>
                                        <input type="text" name="stb_mac_address"
                                            class="form-control @error('stb_mac_address') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan STB MAC Address" />
                                        @error('stb_mac_address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Buat {{ $page_name }}</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@push('js')
    <script>
        document.querySelector('[name="stb_status"]').addEventListener('change', function(e) {
            const macAddressField = document.getElementById('mac-address-field');
            macAddressField.style.display = e.target.value === 'Ada' ? 'block' : 'none';
        });
    </script>
@endpush
