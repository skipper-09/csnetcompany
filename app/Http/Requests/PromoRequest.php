<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoRequest extends FormRequest
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
        if ($this->isMethod('PUT')) {
            return [
                'name' => 'required',
                'logo' => 'image|max:512|file|mimes:jpeg,jpg,png,svg',
                'is_active' => 'required',
                'deskripsi' => 'required',
                'shortdeskripsi' => 'required',
                'slider'=>'required',

            ];
        } else {
            return [
                'name' => 'required',
                'logo' => 'required|image|file|mimes:jpeg,jpg,png,svg',
                'is_active' => 'required',
                'deskripsi' => 'required',
                'shortdeskripsi' => 'required',
                'slider'=>'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Promo Wajib Diisi',
            'logo.required' => 'Gambar Promo Wajib Diisi',
            'logo.image' => 'File yang dimasukkan bukan gambar',
            'logo.mimes' => 'Inputkan file gambar saja',
            'deskripsi.required' => 'Deskripsi Promo Wajib Diisi',
            'shortdeskripsi.required' => 'Deskripsi Singkat Promo Wajib Diisi',
            'is_active.required' => 'Status Wajib Diisi',
            'slider.required' => 'Slider Wajib Diisi',
        ];
    }
}
