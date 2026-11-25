{{-- SECTION 2: Alamat & Lokasi Pemasangan --}}
<section class="{{ $card }}">
    @include('front-end.page.preregister.partials.section-header', [
        'icon' => 'location_on',
        'iconClass' => 'bg-tertiary-fixed text-tertiary',
        'title' => 'Alamat & Lokasi Pemasangan',
        'subtitle' => 'Titik terminasi optical drop core kabel fiber optik ke rumah Anda.',
        'badge' => 'Dropcore ODP',
        'badgeClass' => 'bg-tertiary-fixed text-on-tertiary-fixed',
    ])

    <div class="space-y-space-lg">
        <div>
            <label class="{{ $label }}" for="alamatLengkap">Alamat Lengkap Pemasangan {!! $req !!}</label>
            <textarea class="{{ $input }} resize-none" id="alamatLengkap" name="alamat_lengkap" rows="3"
                placeholder="Nama Jalan, Gang, Nomor Rumah, Blok/Unit, dan patokan terdekat (contoh: depan Masjid Al-Huda atau samping Toko Berkah)"
                maxlength="1000" required>{{ old('alamat_lengkap') }}</textarea>
            @include('front-end.page.preregister.partials.error', ['field' => 'alamat_lengkap'])
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-space-md">
            @foreach (['rt' => ['RT', '001'], 'rw' => ['RW', '004']] as $field => [$title, $placeholder])
                <div>
                    <label class="{{ $label }}" for="{{ $field }}">{{ $title }} {!! $req !!}</label>
                    <input class="{{ $input }}" id="{{ $field }}" name="{{ $field }}" type="text"
                        value="{{ old($field) }}" placeholder="{{ $placeholder }}" inputmode="numeric"
                        maxlength="5" required />
                    @include('front-end.page.preregister.partials.error', ['field' => $field])
                </div>
            @endforeach
            <div class="col-span-2">
                <label class="{{ $label }}" for="kodePos">Isi Kode Pos</label>
                <input class="{{ $input }}" id="kodePos" name="kode_pos" type="text"
                    value="{{ old('kode_pos') }}" placeholder="Kode Pos" inputmode="numeric" maxlength="10" />
                @include('front-end.page.preregister.partials.error', ['field' => 'kode_pos'])
            </div>
        </div>

        {{-- Dropdown wilayah bertingkat, opsinya diisi lewat JS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
            @foreach ([
                'provinsi' => ['Provinsi', 'Memuat...'],
                'kota' => ['Kabupaten / Kota', 'Pilih Provinsi dahulu'],
                'kecamatan' => ['Kecamatan', 'Pilih Kota/Kabupaten dahulu'],
                'kelurahan' => ['Kelurahan / Desa', 'Pilih Kecamatan dahulu'],
            ] as $field => [$title, $placeholder])
                <div>
                    <label class="{{ $label }}" for="{{ $field }}">{{ $title }} {!! $req !!}</label>
                    <select class="{{ $input }}" id="{{ $field }}" name="{{ $field }}"
                        data-old="{{ old($field) }}" required @disabled($field !== 'provinsi')>
                        <option value="">{{ $placeholder }}</option>
                    </select>
                    @include('front-end.page.preregister.partials.error', ['field' => $field])
                </div>
            @endforeach
        </div>

        <div>
            <span class="{{ $label }}">Titik Koordinat GPS / Pinpoint Pemasangan</span>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
                @foreach ([
                    'latitude' => ['Lat', 'Contoh: -8.240672645955511'],
                    'longitude' => ['Long', 'Contoh: 114.35517706751305'],
                ] as $field => [$suffix, $placeholder])
                    <div>
                        <div class="relative">
                            <span class="{{ $iconInside }}">explore</span>
                            <input class="{{ $inputIcon }} pr-14 font-mono" id="{{ $field }}"
                                name="{{ $field }}" type="text" value="{{ old($field) }}"
                                placeholder="{{ $placeholder }}" aria-label="{{ ucfirst($field) }}" />
                            <span
                                class="absolute right-3 top-3.5 font-label-md text-label-md text-outline">{{ $suffix }}</span>
                        </div>
                        @include('front-end.page.preregister.partials.error', ['field' => $field])
                    </div>
                @endforeach
            </div>
            <input type="hidden" name="odp_name" value="{{ old('odp_name') }}">
            <input type="hidden" name="odp_distance" value="{{ old('odp_distance') }}">
        </div>

        <div>
            <span class="{{ $label }}">Estimasi Permintaan Waktu Pemasangan</span>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <input class="{{ $input }}" id="tanggalPemasangan" name="tanggal_pemasangan" type="date"
                    value="{{ old('tanggal_pemasangan') }}" min="{{ now()->toDateString() }}"
                    aria-label="Tanggal pemasangan" />

                <div class="relative">
                    <select class="{{ $input }} appearance-none pr-10" id="jamPemasangan" name="jam_pemasangan"
                        aria-label="Jam pemasangan">
                        <option value="" disabled @selected(!old('jam_pemasangan'))>Pilih rentang jam</option>
                        @foreach ($slotJam as $slot)
                            <option value="{{ $slot }}" @selected(old('jam_pemasangan') === $slot)>
                                {{ str_replace(':', '.', $slot) }} WIB</option>
                        @endforeach
                    </select>
                    <span
                        class="material-symbols-outlined pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-outline">expand_more</span>
                </div>
            </div>
            <small class="text-muted">
                Jadwal final akan dikonfirmasi oleh tim kami menyesuaikan ketersediaan teknisi.
            </small>
            @include('front-end.page.preregister.partials.error', ['field' => 'tanggal_pemasangan'])
            @include('front-end.page.preregister.partials.error', ['field' => 'jam_pemasangan'])
        </div>

        <div>
            <label class="{{ $label }}" for="catatanLokasi">Catatan Khusus Teknisi Pemasangan (Opsional)</label>
            <input class="{{ $input }}" id="catatanLokasi" name="catatan_lokasi" type="text"
                value="{{ old('catatan_lokasi') }}" maxlength="500"
                placeholder="Contoh: Kabel ditarik lewat plafon teras, pagar cat putih dekat pohon mangga" />
            @include('front-end.page.preregister.partials.error', ['field' => 'catatan_lokasi'])
        </div>
    </div>
</section>
