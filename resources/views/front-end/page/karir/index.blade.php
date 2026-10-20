@extends('front-end.layout.base')

@section('title', $page_name)

@php
    use App\Enums\Karir\TipeKerja;
    use App\Models\Lowongan;

    $icons = [
        'users' =>
            '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
        'shield' =>
            '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
        'wallet' =>
            '<rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/>',
        'globe' =>
            '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
        'monitor' => '<rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>',
        'chart' => '<path d="M3 3v18h18"/><path d="M18 17V9M13 17V5M8 17v-3"/>',
        'award' => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'briefcase' =>
            '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        'pin' => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'clock' => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        'arrow' => '<path d="M5 12h14M12 5l7 7-7 7"/>',
        'search' => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        'wifi' =>
            '<path d="M12 20h.01"/><path d="M2 8.82a15 15 0 0 1 20 0"/><path d="M5 12.86a10 10 0 0 1 14 0"/><path d="M8.5 16.43a5 5 0 0 1 7 0"/>',
        'wrench' =>
            '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
        'headset' =>
            '<path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>',
        'code' => '<path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/>',
        'smartphone' => '<rect x="5" y="2" width="14" height="20" rx="2"/><path d="M12 18h.01"/>',
        'pen' => '<path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/>',
        'package' =>
            '<path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/>',
        'megaphone' => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
        'camera' =>
            '<path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/>',
    ];

    $keunggulan = [
        ['icon' => 'users', 'judul' => 'Lingkungan Kerja', 'teks' => 'Profesional & suportif'],
        ['icon' => 'shield', 'judul' => 'Kesempatan', 'teks' => 'Berkembang bersama'],
        ['icon' => 'wallet', 'judul' => 'Gaji & Benefit', 'teks' => 'Kompetitif'],
        ['icon' => 'globe', 'judul' => 'Berdampak', 'teks' => 'Untuk masyarakat'],
    ];

    $alasan = [
        [
            'icon' => 'monitor',
            'judul' => 'Proyek Berskala Nasional',
            'teks' => 'Terlibat membangun infrastruktur jaringan yang dipakai ribuan pelanggan.',
        ],
        [
            'icon' => 'users',
            'judul' => 'Tim yang Solid',
            'teks' => 'Bekerja bersama tim yang kolaboratif dan saling mendukung.',
        ],
        [
            'icon' => 'chart',
            'judul' => 'Peluang Karir Jelas',
            'teks' => 'Jenjang karir terukur sesuai kinerja dan kompetensi.',
        ],
        [
            'icon' => 'award',
            'judul' => 'Pelatihan & Sertifikasi',
            'teks' => 'Dukungan pelatihan dan sertifikasi seperti MTCNA & CCNA.',
        ],
    ];

    // ===== FILTER LOWONGAN =====
    $filter = request()->only(['cari', 'departemen', 'lokasi', 'tipe_kerja']);
    $adaFilter = collect($filter)->filter()->isNotEmpty();

    $lowongans = Lowongan::aktif()
        ->filter($filter)
        ->latest('published_at')
        ->paginate(8)
        ->withQueryString()
        ->fragment('lowongan');

    $jobsJson = $lowongans->getCollection()->mapWithKeys(
        fn($job) => [
            $job->slug => [
                'judul' => $job->judul,
                'icon' => $job->icon,
                'departemen' => $job->departemen,
                'lokasi' => $job->lokasi,
                'tipe' => $job->tipe_kerja->label(),
                'tanggal' => $job->published_at?->translatedFormat('d M Y'),
                'deskripsi' => $job->deskripsi,
                'tanggung_jawab' => $job->tanggung_jawab ?? [],
                'kualifikasi' => $job->kualifikasi ?? [],
                'benefit' => $job->benefit ?? [],
                'url_lamar' => url('karir/lowongan/' . $job->slug . '/lamar'),
            ],
        ],
    );

    $jumlahLowongan = Lowongan::aktif()->count();
    $opsiDepartemen = Lowongan::aktif()->distinct()->orderBy('departemen')->pluck('departemen');
    $opsiLokasi = Lowongan::aktif()->distinct()->orderBy('lokasi')->pluck('lokasi');

    $urlLowongan = url()->current() . '#lowongan';
@endphp

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('front-end/css/karir.css') }}?v={{ filemtime(public_path('front-end/css/karir.css')) }}">

    {{-- HERO --}}
    <section id="hero-2" class="hero-section krr-hero">
        <div class="container">
            <div class="krr-hero__inner">
                <div class="krr-hero__text">
                    <span class="krr-pill">
                        <span class="krr-pill__dot"></span>
                        {{ $jumlahLowongan }} Posisi Sedang Dibuka
                    </span>
                    <h1>Bersama <span>CSNET</span> Bangun Masa Depan Digital Indonesia</h1>
                    <p>Bergabunglah dengan tim kami dan berkontribusi menghubungkan lebih banyak orang dengan internet yang
                        lebih baik.</p>
                    <div class="krr-hero__actions">
                        <a href="#lowongan" class="krr-btn krr-btn--white">
                            Lihat Lowongan
                            <svg viewBox="0 0 24 24">{!! $icons['arrow'] !!}</svg>
                        </a>
                        <a href="#kenapa-csnet" class="krr-btn krr-btn--ghost">Kenapa CSNET?</a>
                    </div>
                </div>

                <div class="krr-hero__media">
                    <span class="krr-hero__glow"></span>
                    <div class="krr-hero__person">
                        <img src="{{ asset('front-end/images/career2.png') }}" alt="Karyawan CSNET">
                        <span class="krr-hero__tagline">Lebih Dekat<br>Menghubungkan<br>Indonesia</span>
                    </div>

                    <div class="krr-float">
                        <span class="krr-float__icon">
                            <svg viewBox="0 0 24 24">{!! $icons['briefcase'] !!}</svg>
                        </span>
                        <div>
                            <strong>{{ $jumlahLowongan }} Lowongan</strong>
                            <small>Tersedia saat ini</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- KEUNGGULAN --}}
    <section class="krr-perks-wrap">
        <div class="container">
            <div class="krr-perks">
                @foreach ($keunggulan as $item)
                    <div class="krr-perk">
                        <span class="krr-perk__icon">
                            <svg viewBox="0 0 24 24">{!! $icons[$item['icon']] !!}</svg>
                        </span>
                        <div>
                            <strong>{{ $item['judul'] }}</strong>
                            <small>{{ $item['teks'] }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- KENAPA BERGABUNG --}}
    <section id="kenapa-csnet" class="krr-section">
        <div class="container">
            <div class="krr-head">
                <span class="krr-eyebrow">Kenapa Kami</span>
                <h2 class="krr-title">Kenapa Bergabung di CSNET?</h2>
            </div>
            <div class="krr-reasons">
                @foreach ($alasan as $item)
                    <div class="krr-card">
                        <span class="krr-card__icon">
                            <svg viewBox="0 0 24 24">{!! $icons[$item['icon']] !!}</svg>
                        </span>
                        <h4>{{ $item['judul'] }}</h4>
                        <p>{{ $item['teks'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- LOWONGAN PEKERJAAN --}}
    <section id="lowongan" class="krr-section mb-5">
        <div class="container">
            <div class="krr-head krr-head--center">
                <h2 class="krr-title">Lowongan Pekerjaan</h2>
                <p class="krr-subtitle">Temukan posisi yang sesuai dengan minat dan keahlian Anda.</p>
            </div>

            <form action="{{ $urlLowongan }}" method="GET" class="krr-filter">
                <div class="krr-search">
                    <svg viewBox="0 0 24 24">{!! $icons['search'] !!}</svg>
                    <input type="text" name="cari" value="{{ $filter['cari'] ?? '' }}"
                        placeholder="Cari posisi, lokasi, atau kata kunci...">
                </div>

                <div class="krr-selects">
                    <select name="departemen" class="krr-select" onchange="this.form.submit()">
                        <option value="">Semua Departemen</option>
                        @foreach ($opsiDepartemen as $opsi)
                            <option value="{{ $opsi }}" @selected(($filter['departemen'] ?? '') === $opsi)>{{ $opsi }}</option>
                        @endforeach
                    </select>

                    <select name="lokasi" class="krr-select" onchange="this.form.submit()">
                        <option value="">Semua Lokasi</option>
                        @foreach ($opsiLokasi as $opsi)
                            <option value="{{ $opsi }}" @selected(($filter['lokasi'] ?? '') === $opsi)>{{ $opsi }}</option>
                        @endforeach
                    </select>

                    <select name="tipe_kerja" class="krr-select" onchange="this.form.submit()">
                        <option value="">Semua Tipe Kerja</option>
                        @foreach (TipeKerja::cases() as $tipe)
                            <option value="{{ $tipe->value }}" @selected(($filter['tipe_kerja'] ?? '') === $tipe->value)>{{ $tipe->label() }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="krr-filter__info">
                    @if ($adaFilter)
                        <a href="{{ $urlLowongan }}" class="krr-reset">Reset filter</a>
                    @endif
                    <span><strong>{{ $lowongans->total() }}</strong> Lowongan Tersedia</span>
                </div>
            </form>

            @if ($lowongans->isEmpty())
                <div class="krr-empty">
                    <span class="krr-empty__icon">
                        <svg viewBox="0 0 24 24">{!! $icons['search'] !!}</svg>
                    </span>
                    <h4>Lowongan tidak ditemukan</h4>
                    <p>Coba ubah kata kunci atau filter pencarian Anda.</p>
                    <a href="{{ $urlLowongan }}" class="krr-btn krr-btn--outline">Reset Filter</a>
                </div>
            @else
                <div class="krr-list">
                    @foreach ($lowongans as $job)
                        <a href="{{ url('karir/lowongan/' . $job->slug) }}" class="krr-row js-detail"
                            data-slug="{{ $job->slug }}">
                            <span class="krr-row__icon">
                                <svg viewBox="0 0 24 24">{!! $icons[$job->icon] ?? $icons['briefcase'] !!}</svg>
                            </span>
                            <div class="krr-row__body">
                                <h4>{{ $job->judul }}</h4>
                                <div class="krr-row__meta">
                                    <span>{{ $job->departemen }}</span>
                                    <span><svg viewBox="0 0 24 24">{!! $icons['pin'] !!}</svg>{{ $job->lokasi }}</span>
                                    <span><svg
                                            viewBox="0 0 24 24">{!! $icons['clock'] !!}</svg>{{ $job->tipe_kerja->label() }}</span>
                                </div>
                                <p>{{ $job->ringkasan }}</p>
                            </div>
                            <span class="krr-row__btn">
                                Lihat Detail
                                <svg viewBox="0 0 24 24">{!! $icons['arrow'] !!}</svg>
                            </span>
                        </a>
                    @endforeach
                </div>

                @if ($lowongans->hasPages())
                    <nav class="krr-pagination">
                        @if ($lowongans->onFirstPage())
                            <span class="is-disabled">&lsaquo;</span>
                        @else
                            <a href="{{ $lowongans->previousPageUrl() }}">&lsaquo;</a>
                        @endif

                        @foreach ($lowongans->getUrlRange(1, $lowongans->lastPage()) as $page => $url)
                            @if ($page == $lowongans->currentPage())
                                <span class="is-active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($lowongans->hasMorePages())
                            <a href="{{ $lowongans->nextPageUrl() }}">&rsaquo;</a>
                        @else
                            <span class="is-disabled">&rsaquo;</span>
                        @endif
                    </nav>
                @endif
            @endif
        </div>
    </section>

    {{-- CTA --}}
    {{-- <section class="krr-section krr-section--last">
        <div class="container">
            <div class="krr-cta">
                <div>
                    <h3>Jadilah Bagian dari Perjalanan Kami</h3>
                    <p>Mari bersama membangun jaringan internet yang menghubungkan Indonesia.</p>
                </div>
                <a href="#lowongan" class="krr-btn krr-btn--white">
                    Lihat Semua Lowongan
                    <svg viewBox="0 0 24 24">{!! $icons['arrow'] !!}</svg>
                </a>
            </div>
        </div>
    </section> --}}

    {{-- MODAL DETAIL LOWONGAN --}}
    <div class="krr-modal" id="krrModal" aria-hidden="true">
        <div class="krr-modal__overlay" data-close></div>

        <div class="krr-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="krrModalTitle">
            <button type="button" class="krr-modal__close" data-close aria-label="Tutup">&times;</button>

            <div class="krr-modal__body">
                <div class="krr-detail__head">
                    <span class="krr-detail__icon" id="krrModalIcon"></span>
                    <div>
                        <h3 id="krrModalTitle"></h3>
                        <div class="krr-detail__meta" id="krrModalMeta"></div>
                    </div>
                </div>

                <div class="krr-detail__block">
                    <h5>Tentang Posisi</h5>
                    <p id="krrModalDesc"></p>
                </div>

                <div class="krr-detail__block" id="krrBlockTugas">
                    <h5>Tanggung Jawab</h5>
                    <ul id="krrModalTugas"></ul>
                </div>

                <div class="krr-detail__block" id="krrBlockKualifikasi">
                    <h5>Kualifikasi</h5>
                    <ul id="krrModalKualifikasi"></ul>
                </div>

                <div class="krr-detail__block" id="krrBlockBenefit">
                    <h5>Benefit</h5>
                    <div class="krr-benefits" id="krrModalBenefit"></div>
                </div>
            </div>

            <div class="krr-modal__footer">
                <a href="#" class="krr-btn krr-btn--primary" id="krrModalLamar">Lamar Sekarang</a>
                <button type="button" class="krr-btn krr-btn--outline" id="krrModalSimpan">
                    <svg viewBox="0 0 24 24">
                        <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" />
                    </svg>
                    <span>Simpan Posisi</span>
                </button>
            </div>
        </div>
    </div>

    <script>
        (function() {
            const JOBS = @json($jobsJson);
            const ICONS = @json($icons);

            const modal = document.getElementById('krrModal');
            const $ = (id) => document.getElementById(id);
            const esc = (s) => String(s ?? '').replace(/[&<>"']/g, (c) => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
            } [c]));
            const svg = (name, cls = '') =>
                `<svg viewBox="0 0 24 24" class="${cls}">${ICONS[name] ?? ICONS.briefcase}</svg>`;
            const listHtml = (items) => items.map((i) => `<li>${esc(i)}</li>`).join('');

            // ===== Simpan posisi (localStorage) =====
            const STORE_KEY = 'krr_saved_jobs';
            const getSaved = () => {
                try {
                    return JSON.parse(localStorage.getItem(STORE_KEY)) || [];
                } catch (e) {
                    return [];
                }
            };
            const setSaved = (arr) => {
                try {
                    localStorage.setItem(STORE_KEY, JSON.stringify(arr));
                } catch (e) {}
            };

            let currentSlug = null;

            function renderSaveButton() {
                const saved = getSaved().includes(currentSlug);
                const btn = $('krrModalSimpan');
                btn.classList.toggle('is-saved', saved);
                btn.querySelector('span').textContent = saved ? 'Tersimpan' : 'Simpan Posisi';
            }

            function openModal(slug) {
                const job = JOBS[slug];
                if (!job) return false;

                currentSlug = slug;

                $('krrModalIcon').innerHTML = svg(job.icon);
                $('krrModalTitle').textContent = job.judul;
                $('krrModalMeta').innerHTML = `
                    <span>${svg('clock')}${esc(job.tipe)}</span>
                    <span>${svg('pin')}${esc(job.lokasi)}</span>
                    <span>${svg('briefcase')}${esc(job.departemen)}</span>
                    ${job.tanggal ? `<span>${svg('clock')}Diposting ${esc(job.tanggal)}</span>` : ''}
                `;
                $('krrModalDesc').textContent = job.deskripsi;

                $('krrModalTugas').innerHTML = listHtml(job.tanggung_jawab);
                $('krrBlockTugas').hidden = job.tanggung_jawab.length === 0;

                $('krrModalKualifikasi').innerHTML = listHtml(job.kualifikasi);
                $('krrBlockKualifikasi').hidden = job.kualifikasi.length === 0;

                $('krrModalBenefit').innerHTML = job.benefit.map((b) => `
                    <div class="krr-benefit">${svg(b.icon)}<span>${esc(b.nama)}</span></div>
                `).join('');
                $('krrBlockBenefit').hidden = job.benefit.length === 0;

                $('krrModalLamar').href = job.url_lamar;
                renderSaveButton();

                modal.classList.add('is-open');
                modal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
                modal.querySelector('.krr-modal__body').scrollTop = 0;
                return true;
            }

            function closeModal() {
                modal.classList.remove('is-open');
                modal.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }

            document.querySelectorAll('.js-detail').forEach((el) => {
                el.addEventListener('click', (e) => {
                    if (openModal(el.dataset.slug)) e.preventDefault();
                });
            });

            modal.querySelectorAll('[data-close]').forEach((el) => el.addEventListener('click', closeModal));
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeModal();
            });

            $('krrModalSimpan').addEventListener('click', () => {
                const saved = getSaved();
                const idx = saved.indexOf(currentSlug);
                idx === -1 ? saved.push(currentSlug) : saved.splice(idx, 1);
                setSaved(saved);
                renderSaveButton();
            });

            $('krrModalLamar').addEventListener('click', (e) => {
                if (!window.KrrForm || !currentSlug) return;
                e.preventDefault();
                closeModal();
                window.KrrForm.open(currentSlug, JOBS[currentSlug].judul);
            });
        })();
    </script>
    @include('front-end.page.karir.partials.form-lamaran')
    <script
        src="{{ asset('front-end/js/form-lamaran.js') }}?v={{ filemtime(public_path('front-end/js/form-lamaran.js')) }}">
    </script>
@endsection
