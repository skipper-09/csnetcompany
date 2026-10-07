@php
    $tglLahir = old(
        'tanggal_lahir',
        $lamaran->tanggal_lahir ? \Carbon\Carbon::parse($lamaran->tanggal_lahir)->format('Y-m-d') : null,
    );
    $punya = old('punya_pengalaman', $lamaran->punya_pengalaman ? '1' : '0');

    $pengalaman = collect(old('pengalaman', $lamaran->pengalaman ?? []))->values();
    if ($pengalaman->isEmpty()) {
        $pengalaman = collect([[]]);
    }

    $bulan = fn($v) => $v ? substr((string) $v, 0, 7) : '';
@endphp

@if ($errors->any())
    <div class="alert alert-danger">Periksa kembali isian form. Ada {{ $errors->count() }} kesalahan.</div>
@endif

<div class="row g-4">
    <div class="col-lg-8">
        {{-- Data pribadi --}}
        <div class="card mb-4">
            <h5 class="card-header">Data Pribadi</h5>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $lamaran->nama_lengkap) }}"
                        class="form-control @error('nama_lengkap') is-invalid @enderror">
                    @error('nama_lengkap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $lamaran->email) }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Telepon / WhatsApp <span class="text-danger">*</span></label>
                    <input type="text" name="telepon" value="{{ old('telepon', $lamaran->telepon) }}"
                        class="form-control @error('telepon') is-invalid @enderror" placeholder="08xxxxxxxxxx">
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">Pilih</option>
                        @foreach ($jenisKelamin as $val => $label)
                            <option value="{{ $val }}" @selected(old('jenis_kelamin', $lamaran->jenis_kelamin) == $val)>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $lamaran->tempat_lahir) }}"
                        class="form-control @error('tempat_lahir') is-invalid @enderror">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_lahir" value="{{ $tglLahir }}"
                        class="form-control @error('tanggal_lahir') is-invalid @enderror">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Domisili <span class="text-danger">*</span></label>
                    <input type="text" name="domisili" value="{{ old('domisili', $lamaran->domisili) }}"
                        class="form-control @error('domisili') is-invalid @enderror">
                    @error('domisili')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">LinkedIn</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $lamaran->linkedin_url) }}"
                        class="form-control @error('linkedin_url') is-invalid @enderror"
                        placeholder="https://linkedin.com/in/...">
                    @error('linkedin_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Pendidikan --}}
        <div class="card mb-4">
            <h5 class="card-header">Pendidikan Terakhir</h5>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Jenjang <span class="text-danger">*</span></label>
                    <select name="pendidikan_terakhir"
                        class="form-select @error('pendidikan_terakhir') is-invalid @enderror">
                        <option value="">Pilih</option>
                        @foreach ($pendidikan as $p)
                            <option value="{{ $p }}" @selected(old('pendidikan_terakhir', $lamaran->pendidikan_terakhir) == $p)>{{ $p }}
                            </option>
                        @endforeach
                    </select>
                    @error('pendidikan_terakhir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label class="form-label">Nama Institusi <span class="text-danger">*</span></label>
                    <input type="text" name="nama_institusi"
                        value="{{ old('nama_institusi', $lamaran->nama_institusi) }}"
                        class="form-control @error('nama_institusi') is-invalid @enderror">
                    @error('nama_institusi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jurusan <span class="text-danger">*</span></label>
                    <input type="text" name="jurusan" value="{{ old('jurusan', $lamaran->jurusan) }}"
                        class="form-control @error('jurusan') is-invalid @enderror">
                    @error('jurusan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="form-label">Masuk</label>
                    <input type="text" name="tahun_masuk" value="{{ old('tahun_masuk', $lamaran->tahun_masuk) }}"
                        class="form-control @error('tahun_masuk') is-invalid @enderror" placeholder="2018"
                        maxlength="4">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Lulus</label>
                    <input type="text" name="tahun_lulus" value="{{ old('tahun_lulus', $lamaran->tahun_lulus) }}"
                        class="form-control @error('tahun_lulus') is-invalid @enderror" placeholder="2022"
                        maxlength="4">
                </div>
                <div class="col-md-2">
                    <label class="form-label">IPK</label>
                    <input type="text" name="ipk" value="{{ old('ipk', $lamaran->ipk) }}"
                        class="form-control @error('ipk') is-invalid @enderror" placeholder="3.50">
                </div>
            </div>
        </div>

        {{-- Pengalaman --}}
        <div class="card mb-4" id="card-pengalaman" data-next-index="{{ $pengalaman->count() }}">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Pengalaman Kerja</h5>
                <select name="punya_pengalaman" id="punya-pengalaman" class="form-select form-select-sm w-auto">
                    <option value="0" @selected($punya == '0')>Belum ada pengalaman</option>
                    <option value="1" @selected($punya == '1')>Punya pengalaman</option>
                </select>
            </div>
            <div class="card-body" id="pengalaman-wrap"
                @if ($punya != '1') style="display:none" @endif>
                <div id="pengalaman-items">
                    @foreach ($pengalaman as $i => $p)
                        <div class="border rounded p-3 mb-3 position-relative" data-pengalaman-row>
                            <button type="button"
                                class="btn btn-sm btn-icon btn-outline-danger position-absolute top-0 end-0 m-2"
                                data-pengalaman-remove>
                                <i class="bx bx-x"></i>
                            </button>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label class="form-label">Perusahaan</label>
                                    <input type="text" name="pengalaman[{{ $i }}][nama_perusahaan]"
                                        value="{{ $p['nama_perusahaan'] ?? '' }}"
                                        class="form-control @error("pengalaman.$i.nama_perusahaan") is-invalid @enderror">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Posisi</label>
                                    <input type="text" name="pengalaman[{{ $i }}][posisi]"
                                        value="{{ $p['posisi'] ?? '' }}"
                                        class="form-control @error("pengalaman.$i.posisi") is-invalid @enderror">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Mulai</label>
                                    <input type="month" name="pengalaman[{{ $i }}][mulai]"
                                        value="{{ $bulan($p['mulai'] ?? null) }}"
                                        class="form-control @error("pengalaman.$i.mulai") is-invalid @enderror">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Selesai</label>
                                    <input type="month" name="pengalaman[{{ $i }}][selesai]"
                                        value="{{ $bulan($p['selesai'] ?? null) }}" class="form-control">
                                </div>
                                <div class="col-md-4 d-flex align-items-end">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="pengalaman[{{ $i }}][masih_bekerja]"
                                            value="1" class="form-check-input" id="masih-{{ $i }}"
                                            @checked(!empty($p['masih_bekerja']) || (!empty($p['nama_perusahaan']) && empty($p['selesai'])))>
                                        <label class="form-check-label" for="masih-{{ $i }}">Masih
                                            bekerja</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="pengalaman[{{ $i }}][deskripsi]" rows="2" class="form-control">{{ $p['deskripsi'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" id="pengalaman-add">
                    <i class="bx bx-plus"></i> Tambah Pengalaman
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <h5 class="card-header">Lamaran</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Lowongan <span class="text-danger">*</span></label>
                    <select name="lowongan_id" class="form-select @error('lowongan_id') is-invalid @enderror">
                        <option value="">Pilih lowongan</option>
                        @foreach ($lowongans as $l)
                            <option value="{{ $l->id }}" @selected(old('lowongan_id', $lamaran->lowongan_id) == $l->id)>{{ $l->judul }}
                            </option>
                        @endforeach
                    </select>
                    @error('lowongan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        @foreach ($statuses as $s)
                            <option value="{{ $s->value }}" @selected(old('status', $lamaran->status?->value) === $s->value)>
                                {{ Str::headline($s->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header">Dokumen</h5>
            <div class="card-body">
                @foreach ($dokumenLabel as $jenis => $label)
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between">
                            <span>{{ $label }}</span>
                            @if (!empty($lamaran->dokumen[$jenis]))
                                <a href="{{ route('admin.karir.lamaran.dokumen', [$lamaran, $jenis]) }}"
                                    target="_blank" class="small">Lihat file</a>
                            @endif
                        </label>
                        <input type="file" name="dokumen[{{ $jenis }}]" accept=".pdf,.jpg,.jpeg,.png"
                            class="form-control form-control-sm @error("dokumen.$jenis") is-invalid @enderror">
                        @error("dokumen.$jenis")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
                <div class="form-text">PDF/JPG/PNG, maks 5 MB. Upload baru akan mengganti file lama.</div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary"><i class="bx bx-save me-1"></i> Simpan</button>
            <a href="{{ $lamaran->exists ? route('admin.karir.lamaran.show', $lamaran) : route('admin.karir.lamaran.index') }}"
                class="btn btn-outline-secondary">Batal</a>
        </div>
    </div>
</div>

<template id="pengalaman-template">
    <div class="border rounded p-3 mb-3 position-relative" data-pengalaman-row>
        <button type="button" class="btn btn-sm btn-icon btn-outline-danger position-absolute top-0 end-0 m-2"
            data-pengalaman-remove>
            <i class="bx bx-x"></i>
        </button>
        <div class="row g-2">
            <div class="col-md-6">
                <label class="form-label">Perusahaan</label>
                <input type="text" name="pengalaman[__I__][nama_perusahaan]" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Posisi</label>
                <input type="text" name="pengalaman[__I__][posisi]" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Mulai</label>
                <input type="month" name="pengalaman[__I__][mulai]" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Selesai</label>
                <input type="month" name="pengalaman[__I__][selesai]" class="form-control">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <div class="form-check mb-2">
                    <input type="checkbox" name="pengalaman[__I__][masih_bekerja]" value="1"
                        class="form-check-input" id="masih-__I__">
                    <label class="form-check-label" for="masih-__I__">Masih bekerja</label>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Deskripsi</label>
                <textarea name="pengalaman[__I__][deskripsi]" rows="2" class="form-control"></textarea>
            </div>
        </div>
    </div>
</template>

@push('js')
    <script>
        (function() {
            const card = document.getElementById('card-pengalaman');
            const wrap = document.getElementById('pengalaman-wrap');
            const items = document.getElementById('pengalaman-items');

            document.getElementById('punya-pengalaman').addEventListener('change', function() {
                wrap.style.display = this.value === '1' ? '' : 'none';
            });

            document.getElementById('pengalaman-add').addEventListener('click', function() {
                const i = parseInt(card.dataset.nextIndex || 0, 10);
                const tmp = document.createElement('div');
                tmp.innerHTML = document.getElementById('pengalaman-template').innerHTML.replaceAll('__I__', i)
                    .trim();
                items.appendChild(tmp.firstElementChild);
                card.dataset.nextIndex = i + 1;
            });

            items.addEventListener('click', function(e) {
                const btn = e.target.closest('[data-pengalaman-remove]');
                if (!btn) return;

                const row = btn.closest('[data-pengalaman-row]');
                if (items.querySelectorAll('[data-pengalaman-row]').length > 1) {
                    row.remove();
                } else {
                    row.querySelectorAll('input, textarea').forEach(el => el.type === 'checkbox' ? el.checked =
                        false : el.value = '');
                }
            });
        })();
    </script>
@endpush
