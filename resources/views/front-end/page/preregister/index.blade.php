@extends('front-end.layout.base')

@section('title', $page_name)

@push('css')
    @include('front-end.page.preregister.partials.styles')
@endpush

@push('js')
    @include('front-end.page.preregister.partials.tailwind')
    @include('front-end.page.preregister.partials.scripts')
@endpush

@section('content')
    @php
        // Kelas Tailwind bersama, dipakai oleh semua partial form
        $card = 'bg-surface-container-lowest rounded-2xl p-space-xl shadow-sm';
        $label = 'block font-title-sm text-title-sm text-on-surface mb-space-2xs';
        $field =
            'w-full py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md placeholder:text-outline shadow-sm focus:outline-none focus:bg-surface-container-low transition-all';
        $input = $field . ' px-4';
        $inputIcon = $field . ' pl-10 pr-4';
        $iconInside = 'material-symbols-outlined absolute left-3 top-3.5 text-outline text-[20px]';
        $req = '<span class="text-error">*</span>';
    @endphp

    @include('front-end.page.preregister.partials.loading')

    <section id="hero-2" class="bg--05 hero-section"></section>

    <section>
        <div class="container">
            <div class="bg-background font-body-md text-on-surface antialiased">
                <main class="w-full bg-background min-h-screen">
                    <div class="relative w-full overflow-x-clip">
                        <div
                            class="absolute -top-40 right-10 w-96 h-96 bg-primary-fixed/20 rounded-full blur-3xl pointer-events-none">
                        </div>
                        <div
                            class="absolute top-80 -left-20 w-80 h-80 bg-secondary-fixed/20 rounded-full blur-3xl pointer-events-none">
                        </div>

                        <div class="max-w-[1200px] mx-auto px-gutter py-space-xl">
                            {{-- Judul halaman --}}
                            <div
                                class="relative w-full overflow-hidden rounded-3xl border border-primary/20 bg-gradient-to-br from-primary-fixed/70 via-primary-fixed/20 to-surface p-6 md:p-8 mb-space-xl">
                                <span
                                    class="material-symbols-outlined pointer-events-none absolute -right-6 -bottom-10 select-none text-primary/10"
                                    style="font-size: 220px; line-height: 1;">home</span>

                                <div class="relative max-w-2xl">
                                    <div
                                        class="inline-flex items-center gap-space-2xs px-space-sm py-1 rounded-full bg-primary-fixed text-on-primary-fixed text-label-md font-label-md mb-space-xs">
                                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                                        PENDAFTARAN RESMI CSNET {{ date('Y') }}
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <div
                                            class="flex h-12 w-12 md:h-14 md:w-14 shrink-0 items-center justify-center rounded-2xl shadow-sm bg-primary text-on-primary">
                                            <span class="material-symbols-outlined text-[28px]">home</span>
                                        </div>
                                        <div>
                                            <h1 class="font-headline-lg text-headline-lg text-on-surface">
                                                Formulir Pasang Baru (PSB) - Retail
                                            </h1>
                                            <p class="text-label-md font-label-md text-on-surface-variant">
                                                Untuk kebutuhan internet rumah &amp; keluarga
                                            </p>
                                        </div>
                                    </div>

                                    <p class="font-body-lg text-body-lg text-on-surface-variant mt-space-xs">
                                        Silakan lengkapi formulir di bawah ini untuk pendaftaran instalasi
                                        jaringan CSNet ke lokasi Anda.
                                    </p>
                                </div>
                            </div>

                            <div id="formErrors" tabindex="-1" role="alert"
                                class="hidden mb-space-xl p-space-md rounded-xl bg-red-50 text-red-700 border border-red-200">
                                <p class="font-title-sm text-title-sm">Pengajuan belum terkirim:</p>
                                <ul class="list-disc pl-5 mt-1"></ul>
                            </div>

                            <form class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start" id="preRegisterForm"
                                action="{{ route('preregister.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="lg:col-span-8 flex flex-col gap-space-xl">
                                    @include('front-end.page.preregister.partials.identitas')
                                    @include('front-end.page.preregister.partials.alamat')
                                    @include('front-end.page.preregister.partials.marketing')
                                    @include('front-end.page.preregister.partials.paket')
                                </div>

                                <div class="lg:col-span-4 flex flex-col gap-space-lg sticky top-24 sticky-box">
                                    @include('front-end.page.preregister.partials.ringkasan')
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection
