@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
    <style>
        .signature-container {
            margin-bottom: 20px;
        }

        .signature-pad-wrapper {
            position: relative;
            width: 100%;
            max-width: 600px;
        }

        .signature-pad {
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            width: 100%;
            height: 200px;
            margin-bottom: 10px;
        }

        .signature-pad canvas {
            width: 100%;
            height: 100%;
        }

        .signature-buttons {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .signature-label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }
    </style>
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
                        <form id="spkForm" action="{{ route('backend.spk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Tanggal Surat</label>
                                        <input type="date" name="date"
                                            class="form-control @error('date') is-invalid @enderror"
                                            id="basic-default-fullname" placeholder="Tanggal" required/>
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
                                            id="basic-default-fullname" placeholder="Tanggal" required/>
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
                                            id="basic-default-fullname" placeholder="Masukan Nama" required/>
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
                                            id="basic-default-fullname" placeholder="Masukan Jabatan" required/>
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
                                            id="basic-default-fullname" placeholder="Masukan Nama Client" required/>
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
                                            id="basic-default-fullname" placeholder="Masukan NIK" required/>
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
                                            id="basic-default-fullname" placeholder="Masukan Alamat" required/>
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
                                            id="basic-default-fullname" placeholder="Masukan No Telepon" required/>
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
                                            id="basic-default-fullname" placeholder="Masukan Nama Paket" required/>
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
                                            id="basic-default-fullname" placeholder="Masukan No Serial Modem" required/>
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
                                            id="basic-default-fullname" placeholder="Masukan Kabel Detail" required/>
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
                            <div class="row mb-3">
                                <h5 class="fw-bold">Tanda Tangan</h5>
                                <!-- Client Signature -->
                                <div class="col-md-6 col-sm-12">
                                    <div class="signature-container">
                                        <label class="signature-label">Tanda Tangan Client</label>
                                        <div class="signature-pad-wrapper">
                                            <div class="signature-pad" id="clientSignaturePad"></div>
                                            <input type="hidden" name="client_signature" id="clientSignature">
                                            <div class="signature-buttons">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    onclick="clearClientSignature()">
                                                    <i class="bx bx-x"></i> Clear
                                                </button>
                                            </div>
                                        </div>
                                        @error('client_signature')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Technician Signature -->
                                <div class="col-md-6 col-sm-12">
                                    <div class="signature-container">
                                        <label class="signature-label">Tanda Tangan Teknisi</label>
                                        <div class="signature-pad-wrapper">
                                            <div class="signature-pad" id="technicianSignaturePad"></div>
                                            <input type="hidden" name="technician_signature" id="technicianSignature">
                                            <div class="signature-buttons">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    onclick="clearTechnicianSignature()">
                                                    <i class="bx bx-x"></i> Clear
                                                </button>
                                            </div>
                                        </div>
                                        @error('technician_signature')
                                            <div class="invalid-feedback d-block">
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
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <script>
        // Initialize signature pads
        let clientSignaturePad;
        let technicianSignaturePad;

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize client signature pad
            const clientCanvas = document.querySelector("#clientSignaturePad canvas");
            if (!clientCanvas) {
                const canvas = document.createElement('canvas');
                document.querySelector("#clientSignaturePad").appendChild(canvas);
            }
            clientSignaturePad = new SignaturePad(document.querySelector("#clientSignaturePad canvas"), {
                backgroundColor: 'rgb(255, 255, 255)',
                penColor: 'rgb(0, 0, 0)'
            });

            // Initialize technician signature pad
            const techCanvas = document.querySelector("#technicianSignaturePad canvas");
            if (!techCanvas) {
                const canvas = document.createElement('canvas');
                document.querySelector("#technicianSignaturePad").appendChild(canvas);
            }
            technicianSignaturePad = new SignaturePad(document.querySelector("#technicianSignaturePad canvas"), {
                backgroundColor: 'rgb(255, 255, 255)',
                penColor: 'rgb(0, 0, 0)'
            });

            // Handle window resize
            window.addEventListener('resize', resizeCanvas);
            resizeCanvas();
        });

        // Resize canvas when window size changes
        function resizeCanvas() {
            const clientPad = document.querySelector("#clientSignaturePad canvas");
            const techPad = document.querySelector("#technicianSignaturePad canvas");
            const ratio = Math.max(window.devicePixelRatio || 1, 1);

            [clientPad, techPad].forEach(canvas => {
                if (canvas) { // Add check if canvas exists
                    const parentWidth = canvas.parentElement.offsetWidth;
                    canvas.width = parentWidth * ratio;
                    canvas.height = 200 * ratio;
                    canvas.style.width = parentWidth + 'px';
                    canvas.style.height = '200px';
                    canvas.getContext("2d").scale(ratio, ratio);
                }
            });
        }

        // Clear signature functions
        function clearClientSignature() {
            if (clientSignaturePad) {
                clientSignaturePad.clear();
            }
        }

        function clearTechnicianSignature() {
            if (technicianSignaturePad) {
                technicianSignaturePad.clear();
            }
        }

        // Form validation and submission
        document.getElementById('spkForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let isValid = true;
            let errorMessage = '';

            // Create hidden input fields if they don't exist
            let clientSignatureInput = document.getElementById('client_signature');
            let technicianSignatureInput = document.getElementById('technician_signature');

            if (!clientSignatureInput) {
                clientSignatureInput = document.createElement('input');
                clientSignatureInput.type = 'hidden';
                clientSignatureInput.name = 'client_signature';
                clientSignatureInput.id = 'client_signature';
                this.appendChild(clientSignatureInput);
            }

            if (!technicianSignatureInput) {
                technicianSignatureInput = document.createElement('input');
                technicianSignatureInput.type = 'hidden';
                technicianSignatureInput.name = 'technician_signature';
                technicianSignatureInput.id = 'technician_signature';
                this.appendChild(technicianSignatureInput);
            }

            // Check if client signature is empty
            if (clientSignaturePad.isEmpty()) {
                errorMessage += 'Tanda tangan client diperlukan.\n';
                isValid = false;
            } else {
                clientSignatureInput.value = clientSignaturePad.toDataURL();
                console.log('Client Signature:', clientSignatureInput.value); // Debug log
            }

            // Check if technician signature is empty
            if (technicianSignaturePad.isEmpty()) {
                errorMessage += 'Tanda tangan teknisi diperlukan.\n';
                isValid = false;
            } else {
                technicianSignatureInput.value = technicianSignaturePad.toDataURL();
                console.log('Technician Signature:', technicianSignatureInput.value); // Debug log
            }

            if (!isValid) {
                alert(errorMessage);
                return;
            }

            // Submit the form
            this.submit();
        });

        document.querySelector('[name="stb_status"]').addEventListener('change', function(e) {
            const macAddressField = document.getElementById('mac-address-field');
            macAddressField.style.display = e.target.value === 'Ada' ? 'block' : 'none';
        });
    </script>
@endpush
