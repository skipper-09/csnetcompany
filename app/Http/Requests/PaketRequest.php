<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaketRequest extends FormRequest
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
            'speed' => 'required|integer',
            'category_id' => 'required',
            'price' => 'required|numeric|integer',
            'is_active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Paket Wajib Diisi',
            'speed.required' => 'Kecepatan Internet Wajib Diisi',
            'speed.integer' => 'Masukan Angka Saja',
            'category_id.required' => 'Category Paket Wajib Diisi',
            'price.required' => 'Harga Paket Wajib Diisi',
            'price.numberic' => 'Masukkan Angka Saja',
            'is_active.required' => 'Status Paket Wajib Diisi',
        ];
    }
}
