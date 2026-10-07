@php
    $listFields = [
        'tanggung_jawab' => [
            'label' => 'Tanggung Jawab',
            'placeholder' => 'Contoh: Melakukan proses rekrutmen dan seleksi',
        ],
        'kualifikasi' => ['label' => 'Kualifikasi', 'placeholder' => 'Contoh: Minimal S1 Psikologi / Manajemen SDM'],
    ];

    $benefits = collect(old('benefit', $lowongan->benefit ?? []))
        ->map(fn($b) => is_array($b) ? $b : ['icon' => null, 'nama' => $b])
        ->values();

    if ($benefits->isEmpty()) {
        $benefits = collect([['icon' => null, 'nama' => '']]);
    }
@endphp

@if ($errors->any())
    <div class="alert alert-danger">Periksa kembali isian form. Ada {{ $errors->count() }} kesalahan.</div>
@endif

<div class="row g-4">
    {{-- Kiri: konten --}}
    <div class="col-lg-8">
        <div class="card mb-4">
            <h5 class="card-header">Informasi Lowongan</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" value="{{ old('judul', $lowongan->judul) }}"
                        class="form-control @error('judul') is-invalid @enderror" placeholder="Staff HRD">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $lowongan->slug) }}"
                        class="form-control @error('slug') is-invalid @enderror"
                        placeholder="Kosongkan untuk dibuat otomatis">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Ringkasan <span class="text-danger">*</span></label>
                    <input type="text" name="ringkasan" value="{{ old('ringkasan', $lowongan->ringkasan) }}"
                        class="form-control @error('ringkasan') is-invalid @enderror"
                        placeholder="Mengelola rekrutmen dan administrasi karyawan.">
                    @error('ringkasan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Tanggung jawab & kualifikasi --}}
        @foreach ($listFields as $field => $cfg)
            @php
                $items = old($field, $lowongan->{$field} ?? []);
                $items = count($items) ? $items : [''];
            @endphp

            <div class="card mb-4" data-list="{{ $field }}">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $cfg['label'] }}</h5>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-list-add>
                        <i class="bx bx-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body" data-list-items>
                    @foreach ($items as $i => $value)
                        <div class="input-group mb-2" data-list-row>
                            <input type="text" name="{{ $field }}[]" value="{{ $value }}"
                                class="form-control @error("$field.$i") is-invalid @enderror"
                                placeholder="{{ $cfg['placeholder'] }}">
                            <button type="button" class="btn btn-outline-danger" data-list-remove>
                                <i class="bx bx-x"></i>
                            </button>
                            @error("$field.$i")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        {{-- Benefit --}}
        <div class="card mb-4" data-list="benefit" data-next-index="{{ $benefits->count() }}">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">Benefit</h5>
                    <small class="text-muted">Icon boleh dikosongkan, akan dipilih otomatis.</small>
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" data-list-add>
                    <i class="bx bx-plus"></i> Tambah
                </button>
            </div>
            <div class="card-body" data-list-items>
                @foreach ($benefits as $i => $b)
                    <div class="input-group mb-2" data-list-row>
                        <input type="text" name="benefit[{{ $i }}][icon]" value="{{ $b['icon'] ?? '' }}"
                            list="list-benefit-icon" class="form-control @error("benefit.$i.icon") is-invalid @enderror"
                            placeholder="Icon" style="max-width: 140px">
                        <input type="text" name="benefit[{{ $i }}][nama]" value="{{ $b['nama'] ?? '' }}"
                            class="form-control @error("benefit.$i.nama") is-invalid @enderror"
                            placeholder="Contoh: Gaji Kompetitif">
                        <button type="button" class="btn btn-outline-danger" data-list-remove>
                            <i class="bx bx-x"></i>
                        </button>
                        @error("benefit.$i.nama")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>
            <datalist id="list-benefit-icon">
                @foreach ($benefitIcons as $icon)
                    <option value="{{ $icon }}">
                @endforeach
            </datalist>
        </div>
    </div>

    {{-- Kanan: atribut --}}
    <div class="col-lg-4">
        <div class="card mb-4">
            <h5 class="card-header">Publikasi</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        @foreach ($statuses as $s)
                            <option value="{{ $s->value }}" @selected(old('status', $lowongan->status?->value) === $s->value)>
                                {{ Str::headline($s->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Publish</label>
                    <input type="datetime-local" name="published_at"
                        value="{{ old('published_at', $lowongan->published_at?->format('Y-m-d\TH:i')) }}"
                        class="form-control @error('published_at') is-invalid @enderror">
                    <div class="form-text">Otomatis diisi saat status Aktif jika kosong.</div>
                    @error('published_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="form-label">Tanggal Ditutup</label>
                    <input type="date" name="ditutup_at"
                        value="{{ old('ditutup_at', $lowongan->ditutup_at?->format('Y-m-d')) }}"
                        class="form-control @error('ditutup_at') is-invalid @enderror">
                    @error('ditutup_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header">Detail</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Departemen <span class="text-danger">*</span></label>
                    <input type="text" name="departemen" list="list-departemen"
                        value="{{ old('departemen', $lowongan->departemen) }}"
                        class="form-control @error('departemen') is-invalid @enderror" placeholder="Human Resources">
                    <datalist id="list-departemen">
                        @foreach ($departemen as $d)
                            <option value="{{ $d }}">
                        @endforeach
                    </datalist>
                    @error('departemen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi" list="list-lokasi"
                        value="{{ old('lokasi', $lowongan->lokasi) }}"
                        class="form-control @error('lokasi') is-invalid @enderror" placeholder="Banyuwangi">
                    <datalist id="list-lokasi">
                        @foreach ($lokasi as $l)
                            <option value="{{ $l }}">
                        @endforeach
                    </datalist>
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipe Kerja <span class="text-danger">*</span></label>
                    <select name="tipe_kerja" class="form-select @error('tipe_kerja') is-invalid @enderror">
                        @foreach ($tipeKerja as $t)
                            <option value="{{ $t->value }}" @selected(old('tipe_kerja', $lowongan->tipe_kerja?->value) === $t->value)>
                                {{ Str::headline($t->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('tipe_kerja')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="form-label">Icon Lowongan</label>
                    <input type="text" name="icon" value="{{ old('icon', $lowongan->icon) }}"
                        class="form-control @error('icon') is-invalid @enderror" placeholder="users">
                    <div class="form-text">Key icon yang dipakai di halaman karir.</div>
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary"><i class="bx bx-save me-1"></i> Simpan</button>
            <a href="{{ route('admin.karir.lowongan.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </div>
</div>

{{-- Template baris --}}
<template id="list-row-template">
    <div class="input-group mb-2" data-list-row>
        <input type="text" class="form-control">
        <button type="button" class="btn btn-outline-danger" data-list-remove><i class="bx bx-x"></i></button>
    </div>
</template>

<template id="benefit-row-template">
    <div class="input-group mb-2" data-list-row>
        <input type="text" name="benefit[__INDEX__][icon]" list="list-benefit-icon" class="form-control"
            placeholder="Icon" style="max-width: 140px">
        <input type="text" name="benefit[__INDEX__][nama]" class="form-control"
            placeholder="Contoh: Gaji Kompetitif">
        <button type="button" class="btn btn-outline-danger" data-list-remove><i class="bx bx-x"></i></button>
    </div>
</template>

@push('js')
    <script>
        document.addEventListener('click', function(e) {
            const addBtn = e.target.closest('[data-list-add]');
            if (addBtn) {
                const card = addBtn.closest('[data-list]');
                let row, input;

                if (card.dataset.list === 'benefit') {
                    const index = parseInt(card.dataset.nextIndex || 0, 10);
                    const wrap = document.createElement('div');
                    wrap.innerHTML = document.getElementById('benefit-row-template').innerHTML
                        .replaceAll('__INDEX__', index).trim();
                    row = wrap.firstElementChild;
                    input = row.querySelector('input[name$="[nama]"]');
                    card.dataset.nextIndex = index + 1;
                } else {
                    row = document.getElementById('list-row-template').content.firstElementChild.cloneNode(true);
                    input = row.querySelector('input');
                    input.name = card.dataset.list + '[]';
                    input.placeholder = card.querySelector('[data-list-row] input')?.placeholder ?? '';
                }

                card.querySelector('[data-list-items]').appendChild(row);
                input.focus();
                return;
            }

            const removeBtn = e.target.closest('[data-list-remove]');
            if (removeBtn) {
                const items = removeBtn.closest('[data-list-items]');
                const row = removeBtn.closest('[data-list-row]');

                if (items.querySelectorAll('[data-list-row]').length > 1) {
                    row.remove();
                } else {
                    row.querySelectorAll('input').forEach(i => i.value = '');
                }
            }
        });

        // Enter di input list = tambah baris, bukan submit
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.matches('[data-list-row] input')) {
                e.preventDefault();
                e.target.closest('[data-list]').querySelector('[data-list-add]').click();
            }
        });
    </script>
@endpush
