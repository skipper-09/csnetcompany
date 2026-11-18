@php
    $isEdit = isset($setting);
    $secret = $isEdit && $setting->isSecret();
    $prefill = $secret ? old('value') : old('value', $setting->value ?? '');
@endphp

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="group">Grup</label>
    <div class="col-sm-10">
        <input type="text" name="group" id="group" class="form-control @error('group') is-invalid @enderror"
            value="{{ old('group', $setting->group ?? '') }}" placeholder="Contoh: whatsapp, payment, mail">
        @error('group')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="key">Key <span class="text-danger">*</span></label>
    <div class="col-sm-10">
        @if ($isEdit)
            <input type="text" id="key" class="form-control" value="{{ $setting->key }}" readonly disabled>
            <div class="form-text">Key tidak bisa diubah.</div>
        @else
            <input type="text" name="key" id="key" class="form-control @error('key') is-invalid @enderror"
                value="{{ old('key') }}" placeholder="Contoh: whatsapp.api_token">
            @error('key')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Huruf kecil, angka, titik, underscore. Dipakai di kode:
                <code>Setting::get('key')</code></div>
        @endif
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="label">Label <span class="text-danger">*</span></label>
    <div class="col-sm-10">
        <input type="text" name="label" id="label" class="form-control @error('label') is-invalid @enderror"
            value="{{ old('label', $setting->label ?? '') }}" placeholder="Contoh: Token API WhatsApp">
        @error('label')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="type">Tipe <span class="text-danger">*</span></label>
    <div class="col-sm-10">
        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
            @foreach (\App\Models\Setting::TYPES as $val => $text)
                <option value="{{ $val }}" @selected(old('type', $setting->type ?? 'text') === $val)>{{ $text }}</option>
            @endforeach
        </select>
        @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="value-input">Nilai</label>
    <div class="col-sm-10">
        <div id="value-input-wrap" class="input-group has-validation">
            <input type="text" name="value" id="value-input"
                class="form-control @error('value') is-invalid @enderror" value="{{ $prefill }}"
                autocomplete="new-password" placeholder="{{ $secret ? '••••••••' : '' }}">
            <button type="button" class="btn btn-outline-secondary" id="toggle-value" title="Tampilkan / sembunyikan">
                <i class="bx bx-show"></i>
            </button>
            @error('value')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <textarea name="value" id="value-textarea" rows="4"
            class="form-control d-none @error('value') is-invalid @enderror" disabled>{{ $prefill }}</textarea>

        <div class="form-text" id="value-hint"></div>
    </div>
</div>

<div class="row mb-4">
    <label class="col-sm-2 col-form-label" for="description">Keterangan</label>
    <div class="col-sm-10">
        <input type="text" name="description" id="description"
            class="form-control @error('description') is-invalid @enderror"
            value="{{ old('description', $setting->description ?? '') }}" placeholder="Opsional">
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

@push('js')
    <script>
        $(function() {
            const SECRET_TYPES = ['password', 'token'];
            const wasSecret = @json($secret);

            function syncValueField() {
                const type = $('#type').val();
                const isTextarea = type === 'textarea';
                const isSecret = SECRET_TYPES.includes(type);

                $('#value-input-wrap').toggleClass('d-none', isTextarea);
                $('#value-input').prop('disabled', isTextarea);
                $('#value-textarea').toggleClass('d-none', !isTextarea).prop('disabled', !isTextarea);

                const inputType = isSecret ? 'password' : ({
                    url: 'url',
                    number: 'number'
                } [type] ?? 'text');
                $('#value-input').attr('type', inputType);

                $('#toggle-value').toggleClass('d-none', !isSecret);
                $('#toggle-value i').attr('class', 'bx bx-show');

                let hint = '';
                if (isSecret) {
                    hint = 'Nilai disimpan terenkripsi.' + (wasSecret ? ' Kosongkan jika tidak ingin mengubah.' :
                        '');
                }
                $('#value-hint').text(hint);
            }

            $('#type').on('change', syncValueField);

            $('#toggle-value').on('click', function() {
                const $input = $('#value-input');
                const show = $input.attr('type') === 'password';
                $input.attr('type', show ? 'text' : 'password');
                $(this).find('i').attr('class', show ? 'bx bx-hide' : 'bx bx-show');
            });

            syncValueField();
        });
    </script>
@endpush
