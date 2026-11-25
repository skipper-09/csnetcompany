{{-- SECTION 1: Identitas Pemohon --}}
<section class="{{ $card }}">
    @include('front-end.page.preregister.partials.section-header', [
        'icon' => 'badge',
        'iconClass' => 'bg-primary-fixed text-primary',
        'title' => 'Data Identitas Pemohon',
        'subtitle' => 'Pastikan data sesuai dengan Kartu Tanda Penduduk (e-KTP) asli.',
        'badge' => 'Wajib Lengkap',
        'badgeClass' => 'bg-surface-variant text-on-surface-variant',
    ])

    <div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg">
        <div class="md:col-span-2">
            <label class="{{ $label }}" for="namaLengkap">Nama Lengkap (Sesuai KTP) {!! $req !!}</label>
            <div class="relative">
                <span class="{{ $iconInside }}">person</span>
                <input class="{{ $inputIcon }}" id="namaLengkap" name="nama_lengkap" type="text" placeholder="Contoh: GURUH HINDARTO" maxlength="255"
                    autocomplete="name" required />
            </div>
            @include('front-end.page.preregister.partials.error', ['field' => 'nama_lengkap'])
        </div>

        <div>
            <label class="{{ $label }}" for="nik">Nomor Induk Kependudukan (NIK) {!! $req !!}</label>
            <div class="relative">
                <span class="{{ $iconInside }}">credit_card</span>
                <input class="{{ $inputIcon }}" id="nik" name="nik" type="text"
                    placeholder="3512xxxxxxxxxxxx" inputmode="numeric" maxlength="16" pattern="[0-9]{16}"
                    title="NIK harus 16 digit angka" required />
            </div>
            <p class="font-label-md text-label-md text-outline mt-1 flex items-center gap-1">
                <span class="material-symbols-outlined text-[14px]">info</span>
                Wajib 16 digit sesuai e-KTP untuk validasi Disdukcapil
            </p>
            @include('front-end.page.preregister.partials.error', ['field' => 'nik'])
        </div>

        <div>
            <span class="{{ $label }}">Jenis Kelamin {!! $req !!}</span>
            <div class="grid grid-cols-2 gap-space-xs p-1 bg-surface-container-low rounded-lg">
                @foreach (['Laki-laki' => 'man', 'Perempuan' => 'woman'] as $gender => $genderIcon)
                    <label
                        class="flex items-center justify-center gap-2 py-2.5 px-3 rounded-md cursor-pointer transition-all text-on-surface-variant font-title-sm text-title-sm has-[:checked]:bg-surface-container-lowest has-[:checked]:text-primary has-[:checked]:shadow-sm">
                        <input class="sr-only" name="jenis_kelamin" type="radio" value="{{ $gender }}"
                            @checked($loop->first) />
                        <span class="material-symbols-outlined text-[18px]">{{ $genderIcon }}</span>
                        <span>{{ $gender }}</span>
                    </label>
                @endforeach
            </div>
            @include('front-end.page.preregister.partials.error', ['field' => 'jenis_kelamin'])
        </div>

        <div>
            <label class="{{ $label }}" for="tanggalLahir">Tanggal Lahir {!! $req !!}</label>
            <div class="relative">
                <span class="{{ $iconInside }}">calendar_month</span>
                <input class="{{ $inputIcon }}" id="tanggalLahir" name="tanggal_lahir" type="date" max="{{ now()->subDay()->toDateString() }}" required />
            </div>
            @include('front-end.page.preregister.partials.error', ['field' => 'tanggal_lahir'])
        </div>

        <div>
            <label class="{{ $label }}" for="whatsapp">Nomor WhatsApp / HP Aktif {!! $req !!}</label>
            <div class="flex rounded-lg shadow-sm overflow-hidden bg-surface-container-lowest">
                <span
                    class="inline-flex items-center px-3 bg-surface-container text-on-surface font-title-sm text-title-sm font-semibold">
                    <span class="material-symbols-outlined text-primary mr-1 text-[18px]">chat</span>
                    +62
                </span>
                <input
                    class="w-full px-4 py-3 bg-transparent text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:bg-surface-container-low transition-all"
                    id="whatsapp" name="whatsapp" type="tel" placeholder="81234567890"
                    inputmode="numeric" autocomplete="tel-national" maxlength="13" pattern="[0-9]{9,13}"
                    title="Nomor WhatsApp 9–13 digit angka" required />
            </div>
            @include('front-end.page.preregister.partials.error', ['field' => 'whatsapp'])
        </div>

        <div class="md:col-span-2">
            <label class="{{ $label }}" for="email">Alamat Email Aktif</label>
            <div class="relative">
                <span class="{{ $iconInside }}">mail</span>
                <input class="{{ $inputIcon }}" id="email" name="email" type="email" placeholder="nama.email@gmail.com" autocomplete="email" />
            </div>
            <p class="font-label-md text-label-md text-outline mt-1">
                E-invoice bulanan dan tanda terima digital akan dikirimkan ke email ini.
            </p>
            @include('front-end.page.preregister.partials.error', ['field' => 'email'])
        </div>

        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-space-md">
            @include('front-end.page.preregister.partials.upload', [
                'name' => 'ktp',
                'title' => 'Upload Foto Asli e-KTP',
                'icon' => 'badge',
                'dropText' => 'Tarik & Lepaskan foto e-KTP atau',
                'hint' => 'Pastikan NIK dan wajah terbaca jelas tanpa pantulan cahaya.',
            ])
            @include('front-end.page.preregister.partials.upload', [
                'name' => 'foto_rumah',
                'title' => 'Upload Foto Rumah',
                'icon' => 'home',
                'dropText' => 'Tarik & Lepaskan foto rumah atau',
                'hint' => 'Foto tampak depan rumah, nomor rumah terlihat jika ada.',
            ])
        </div>
    </div>
</section>
