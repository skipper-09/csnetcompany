<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class MediaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'type' => 'required',
            'pdf' => "mimetypes:application/pdf|max:20000",
            'usertype' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Judul Wajib Diisi',
            'type.required' => 'Tipe Konten Wajib Diisi',
            'pdf.mimetypes' => 'Hanya Menerima Inputan File PDF',
            'pdf.max' => 'Size File Melebihi Batas 10Mb',
            'usertype.required' => 'Tipe User Wajib Diisi',
        ];
    }
}
