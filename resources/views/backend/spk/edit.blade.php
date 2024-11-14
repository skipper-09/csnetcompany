@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">Edit {{ $page_name }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('backend.spk') }}">Surat Tugas Pemasangan Retail</a>
                    </li>
                    <li class="breadcrumb-item">Edit Surat Tugas Pemasangan Retail</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('backend.spk.update', ['id' => $spk->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Tanggal Surat</label>
                                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                                               id="basic-default-fullname" placeholder="Tanggal surat" 
                                               value="{{ old('date', \Carbon\Carbon::parse($spk->date)->format('Y-m-d')) }}" />
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Tanggal Instalasi</label>
                                        <input type="date" name="date_install"
                                            class="form-control @error('date_install') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Tanggal instalasi"
                                            value="{{ old('date_install', \Carbon\Carbon::parse($spk->date_install)->format('Y-m-d')) }}" />
                                        @error('date_install')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Nama</label>
                                        <input type="text" name="technician_name"
                                            class="form-control @error('technician_name') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan Nama"
                                            value="{{ $spk->technician_name }}" />
                                        @error('technician_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Jabatan</label>
                                        <input type="text" name="technician_position"
                                            class="form-control @error('technician_position') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan Jabatan"
                                            value="{{ $spk->technician_position }}" />
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
                                            id="basic-default-fullname" placeholder="Masukan Nama Client"
                                            value={{ $spk->client_name }} />
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
                                            id="basic-default-fullname" placeholder="Masukan NIK"
                                            value={{ $spk->client_nik }} />
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
                                            id="basic-default-fullname" placeholder="Masukan Alamat"
                                            value={{ $spk->client_address }} />
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
                                            id="basic-default-fullname" placeholder="Masukan No Telepon"
                                            value={{ $spk->client_whatsapp }} />
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
                                            id="basic-default-fullname" placeholder="Masukan Nama Paket"
                                            value={{ $spk->package }} />
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
                                            id="basic-default-fullname" placeholder="Masukan No Serial Modem"
                                            value={{ $spk->modem_serial }} />
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
                                            id="basic-default-fullname" placeholder="Masukan Kabel Detail"
                                            value={{ $spk->cable_details }} />
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
                                        <select name="stb_status" class="form-control @error('stb_status') is-invalid @enderror">
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
                                </div>
                                <div class="col-md-6 col-sm-12" id="mac-address-field">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">STB MAC Address</label>
                                        <input type="text" name="stb_mac_address"
                                            class="form-control @error('stb_mac_address') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Masukan STB MAC Address"
                                            value="{{ $spk->stb_mac_address }}" />
                                        @error('stb_mac_address')
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

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const stbStatusElement = document.querySelector('[name="stb_status"]');
                const macAddressField = document.getElementById('mac-address-field');

                if (stbStatusElement && macAddressField) {
                    stbStatusElement.addEventListener('change', function(e) {
                        // Show the mac address field if the selected value is 'Ada', otherwise hide it
                        macAddressField.style.display = e.target.value === 'Ada' ? 'block' : 'none';
                    });

                    // Optionally set the initial display based on the current value
                    macAddressField.style.display = stbStatusElement.value === 'Ada' ? 'block' : 'none';
                } else {
                    console.warn('Required elements not found in the DOM.');
                }
            });
        </script>
    @endpush

@endsection
