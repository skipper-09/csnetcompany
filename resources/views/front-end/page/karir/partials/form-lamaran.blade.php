@php
    use App\Enums\Karir\JenisDokumen;
    use App\Enums\Karir\JenjangPendidikan;

    $steps = [1 => 'Data Pribadi', 2 => 'Data Pendidikan', 3 => 'Pengalaman', 4 => 'Dokumen', 5 => 'Review'];
    $jenjangs = JenjangPendidikan::cases();
@endphp

<div class="krr-modal krr-modal--form" id="krrFormModal" aria-hidden="true">
    <div class="krr-modal__overlay" data-close-form></div>

    <div class="krr-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="krrFormTitle">
        <button type="button" class="krr-modal__close" data-close-form aria-label="Tutup">&times;</button>

        <form id="krrFormLamaran" class="krr-form" action="{{ route('karir.lamaran.store') }}" method="POST"
            enctype="multipart/form-data" novalidate>
            @csrf
            <input type="hidden" name="lowongan_slug">

            {{-- HEADER --}}
            <div class="krr-form__header" data-hide-on-success>
                <h3 id="krrFormTitle">Form Lamaran Pekerjaan</h3>
                <p>Melamar sebagai <strong data-posisi></strong>. Lengkapi data diri Anda dengan benar.</p>

                <ol class="krr-stepper">
                    @foreach ($steps as $no => $label)
                        <li data-step-nav="{{ $no }}">
                            <span class="krr-stepper__dot">{{ $no }}</span>
                            <span class="krr-stepper__label">{{ $label }}</span>
                        </li>
                    @endforeach
                </ol>
            </div>

            <div class="krr-form__body">

                {{-- ===== STEP 1 ===== --}}
                <section class="krr-step" data-step="1">
                    <h4 class="krr-form__title">Data Pribadi</h4>

                    <div class="krr-grid-2">
                        <div class="krr-field">
                            <label>Nama Lengkap <span>*</span></label>
                            <input type="text" name="nama_lengkap" class="krr-input"
                                placeholder="Masukkan nama lengkap" required maxlength="255">
                        </div>
                        <div class="krr-field">
                            <label>Email <span>*</span></label>
                            <input type="email" name="email" class="krr-input" placeholder="nama@email.com" required
                                maxlength="255">
                        </div>
                    </div>

                    <div class="krr-field">
                        <label>No. Telepon <span>*</span></label>
                        <div class="krr-phone">
                            <span class="krr-phone__prefix">🇮🇩 +62</span>
                            <input type="tel" name="telepon" placeholder="812 3456 7890" inputmode="numeric"
                                required pattern="0?8[0-9\s\-]{7,13}">
                        </div>
                    </div>

                    <div class="krr-grid-2">
                        <div class="krr-field">
                            <label>Tempat, Tanggal Lahir <span>*</span></label>
                            <div class="krr-grid-2 krr-grid--tight">
                                <input type="text" name="tempat_lahir" class="krr-input" placeholder="Tempat lahir"
                                    required maxlength="100">
                                <input type="date" name="tanggal_lahir" class="krr-input" required
                                    max="{{ now()->subDay()->toDateString() }}">
                            </div>
                        </div>
                        <div class="krr-field">
                            <label>Jenis Kelamin <span>*</span></label>
                            <div class="krr-radios">
                                <label class="krr-radio"><input type="radio" name="jenis_kelamin" value="L"
                                        required checked> <span>Laki-laki</span></label>
                                <label class="krr-radio"><input type="radio" name="jenis_kelamin" value="P">
                                    <span>Perempuan</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="krr-field">
                        <label>Domisili Saat Ini <span>*</span></label>
                        <select name="domisili" class="krr-select" required>
                            <option value="">Pilih kota / kabupaten</option>
                            @foreach (config('karir.domisili') as $kota)
                                <option value="{{ $kota }}">{{ $kota }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="krr-field">
                        <label>LinkedIn <em>(opsional)</em></label>
                        <input type="url" name="linkedin_url" class="krr-input"
                            placeholder="https://linkedin.com/in/username" maxlength="255">
                    </div>
                </section>

                {{-- ===== STEP 2 ===== --}}
                <section class="krr-step" data-step="2">
                    <h4 class="krr-form__title">Data Pendidikan</h4>

                    <div class="krr-grid-2">
                        <div class="krr-field">
                            <label>Pendidikan Terakhir <span>*</span></label>
                            <select name="pendidikan_terakhir" class="krr-select" required>
                                <option value="">Pilih jenjang pendidikan</option>
                                @foreach ($jenjangs as $j)
                                    <option value="{{ $j->value }}">{{ $j->label() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="krr-field">
                            <label>Nama Institusi <span>*</span></label>
                            <input type="text" name="nama_institusi" class="krr-input"
                                placeholder="Masukkan nama institusi" required maxlength="255">
                        </div>
                    </div>

                    <div class="krr-grid-2">
                        <div class="krr-field">
                            <label>Jurusan <span>*</span></label>
                            <input type="text" name="jurusan" class="krr-input" placeholder="Masukkan jurusan"
                                required maxlength="255">
                        </div>
                        <div class="krr-grid-2 krr-grid--tight">
                            <div class="krr-field">
                                <label>Tahun Masuk</label>
                                <input type="number" name="tahun_masuk" class="krr-input" placeholder="Tahun masuk"
                                    min="1970" max="{{ date('Y') }}">
                            </div>
                            <div class="krr-field">
                                <label>Tahun Lulus</label>
                                <input type="number" name="tahun_lulus" class="krr-input" placeholder="Tahun lulus"
                                    min="1970" max="{{ date('Y') + 5 }}">
                            </div>
                        </div>
                    </div>

                    <div class="krr-grid-2">
                        <div class="krr-field">
                            <label>IPK <em>(opsional)</em></label>
                            <input type="number" name="ipk" class="krr-input" placeholder="Contoh: 3.50"
                                step="0.01" min="0" max="4">
                        </div>
                    </div>

                    <h5 class="krr-form__subtitle">Pendidikan Lainnya <em>(opsional)</em></h5>
                    <div data-list="pendidikan"></div>
                    <button type="button" class="krr-add" data-add="pendidikan">+ Tambah Riwayat Pendidikan</button>
                </section>

                {{-- ===== STEP 3 ===== --}}
                <section class="krr-step" data-step="3">
                    <h4 class="krr-form__title">Pengalaman Kerja</h4>

                    <div class="krr-field">
                        <label>Apakah Anda memiliki pengalaman kerja? <span>*</span></label>
                        <div class="krr-radios">
                            <label class="krr-radio"><input type="radio" name="punya_pengalaman" value="1"
                                    required checked> <span>Ya</span></label>
                            <label class="krr-radio"><input type="radio" name="punya_pengalaman" value="0">
                                <span>Tidak</span></label>
                        </div>
                    </div>

                    <fieldset class="krr-fieldset" data-pengalaman-wrap>
                        <div data-list="pengalaman"></div>
                        <button type="button" class="krr-add" data-add="pengalaman">+ Tambah Pengalaman
                            Kerja</button>
                    </fieldset>

                    <div class="krr-note" data-fresh-note hidden>
                        Tidak masalah! Fresh graduate tetap dipersilakan melamar. Lanjutkan ke tahap berikutnya.
                    </div>
                </section>

                {{-- ===== STEP 4 ===== --}}
                <section class="krr-step" data-step="4">
                    <h4 class="krr-form__title">Upload Dokumen</h4>
                    <p class="krr-form__desc">Unggah dokumen dalam format PDF, DOC, atau DOCX. Maksimal 5 MB per file.
                    </p>

                    <div class="krr-docs">
                        @foreach (JenisDokumen::cases() as $jenis)
                            <div class="krr-doc krr-field">
                                <div class="krr-doc__row">
                                    <span class="krr-doc__icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                            <path d="M14 2v6h6" />
                                        </svg>
                                    </span>
                                    <span class="krr-doc__label">
                                        {{ $jenis->label() }}
                                        @if ($jenis->wajib())
                                            <span class="krr-req">*</span>
                                        @else
                                            <em>(opsional)</em>
                                        @endif
                                    </span>
                                    <label class="krr-doc__pick">
                                        Pilih File
                                        <input type="file" class="krr-sr-only"
                                            name="dokumen[{{ $jenis->value }}]" accept=".pdf,.doc,.docx"
                                            data-label="{{ $jenis->label() }}" @required($jenis->wajib())>
                                    </label>
                                    <span class="krr-doc__name">
                                        <span data-file-name>Tidak ada file dipilih</span>
                                        <button type="button" class="krr-doc__del" data-file-clear
                                            hidden>&times;</button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="krr-note">Pastikan semua dokumen yang diunggah sudah sesuai dan terbaca dengan jelas.
                    </div>
                </section>

                {{-- ===== STEP 5 ===== --}}
                <section class="krr-step" data-step="5">
                    <h4 class="krr-form__title">Review & Kirim Lamaran</h4>
                    <p class="krr-form__desc">Periksa kembali semua data yang Anda masukkan.</p>

                    <div class="krr-alert" data-form-alert hidden></div>
                    <div data-review></div>

                    <div class="krr-field">
                        <label class="krr-check krr-check--block">
                            <input type="checkbox" name="pernyataan" value="1" required>
                            Saya menyatakan bahwa semua informasi yang saya berikan adalah benar dan dapat
                            dipertanggungjawabkan.
                        </label>
                    </div>
                </section>

                {{-- ===== SUKSES ===== --}}
                <section class="krr-step krr-success" data-step="success">
                    <div class="krr-success__icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 6 9 17l-5-5" />
                        </svg>
                    </div>
                    <h3>Lamaran Berhasil Dikirim!</h3>
                    <p>Terima kasih telah melamar posisi <strong data-success-posisi></strong> di CSNET.<br>
                        Tim HR kami akan meninjau lamaran Anda dan menghubungi jika lolos ke proses selanjutnya.</p>
                    <div class="krr-success__kode">Kode Lamaran: <strong data-success-kode></strong></div>
                    <button type="button" class="krr-btn krr-btn--primary" data-close-form>Kembali ke Halaman
                        Karir</button>
                </section>
            </div>

            {{-- FOOTER --}}
            <div class="krr-form__footer" data-hide-on-success>
                <button type="button" class="krr-btn krr-btn--outline" data-prev>Batal</button>
                <button type="button" class="krr-btn krr-btn--primary" data-next>
                    Lanjut ke <span data-next-label>Pendidikan</span> &rarr;
                </button>
                <button type="submit" class="krr-btn krr-btn--primary" data-submit hidden>Kirim Lamaran</button>
            </div>
        </form>
    </div>
</div>

{{-- TEMPLATE REPEATER --}}
<template id="tplPendidikan">
    <div class="krr-repeat">
        <button type="button" class="krr-repeat__del" data-remove title="Hapus">&times;</button>
        <div class="krr-grid-2">
            <div class="krr-field">
                <label>Jenjang <span>*</span></label>
                <select name="pendidikan_lainnya[__i__][jenjang]" class="krr-select" data-f="jenjang" required>
                    <option value="">Pilih jenjang</option>
                    @foreach ($jenjangs as $j)
                        <option value="{{ $j->value }}">{{ $j->label() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="krr-field">
                <label>Nama Institusi <span>*</span></label>
                <input type="text" name="pendidikan_lainnya[__i__][nama_institusi]" class="krr-input"
                    data-f="nama_institusi" placeholder="Nama institusi" required maxlength="255">
            </div>
            <div class="krr-field">
                <label>Jurusan</label>
                <input type="text" name="pendidikan_lainnya[__i__][jurusan]" class="krr-input" data-f="jurusan"
                    placeholder="Jurusan" maxlength="255">
            </div>
            <div class="krr-field">
                <label>Tahun Lulus</label>
                <input type="number" name="pendidikan_lainnya[__i__][tahun_lulus]" class="krr-input"
                    data-f="tahun_lulus" placeholder="Tahun lulus" min="1970" max="{{ date('Y') + 5 }}">
            </div>
        </div>
    </div>
</template>

<template id="tplPengalaman">
    <div class="krr-repeat">
        <button type="button" class="krr-repeat__del" data-remove title="Hapus">&times;</button>
        <div class="krr-grid-2">
            <div class="krr-field">
                <label>Nama Perusahaan <span>*</span></label>
                <input type="text" name="pengalaman[__i__][nama_perusahaan]" class="krr-input"
                    data-f="nama_perusahaan" placeholder="Masukkan nama perusahaan" required maxlength="255">
            </div>
            <div class="krr-field">
                <label>Posisi <span>*</span></label>
                <input type="text" name="pengalaman[__i__][posisi]" class="krr-input" data-f="posisi"
                    placeholder="Masukkan posisi" required maxlength="255">
            </div>
        </div>
        <div class="krr-field">
            <label>Periode <span>*</span></label>
            <div class="krr-period">
                <input type="month" name="pengalaman[__i__][mulai]" class="krr-input" data-f="mulai" required>
                <span>—</span>
                <input type="month" name="pengalaman[__i__][selesai]" class="krr-input" data-f="selesai" required>
            </div>
            <label class="krr-check">
                <input type="checkbox" name="pengalaman[__i__][masih_bekerja]" value="1" data-masih> Saya masih
                bekerja di sini
            </label>
        </div>
        <div class="krr-field">
            <label>Deskripsi Pekerjaan</label>
            <textarea name="pengalaman[__i__][deskripsi]" class="krr-input" data-f="deskripsi" rows="3" maxlength="500"
                placeholder="Jelaskan tugas dan tanggung jawab Anda"></textarea>
            <small class="krr-hint">Maksimal 500 karakter</small>
        </div>
    </div>
</template>
