<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacketDescriptionRequest extends FormRequest
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
                'packet_id' => 'required',
                'logo' => 'image|max:512|file|mimes:jpeg,jpg,png,svg'
            ];
        } else {
            return [
                'name' => 'required',
                'packet_id' => 'required',
                'logo' => 'required|image|max:512|file|mimes:jpeg,jpg,png,svg'
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Deskripsi Wajib Diisi',
            'packet_id.required' => 'Paket Wajib Dipilih',
            'logo.required' => 'Gambar Deskripsi Wajib Diisi',
            'logo.max' => 'Max ukuran gambar 512kb',
            'logo.image' => 'File yang dimasukkan bukan gambar',
            'logo.mimes' => 'Inputkan file gambar saja',
        ];
    }
}
