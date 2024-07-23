<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
            "name"=> 'required',
            "kode_pos"=>'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama Area Wajib Diisi',
            'kode_pos.required' => 'Kode Pos Wajib Diisi',
            'kode_pos.integer' => 'Inputkan Hanya Angka',
        ];
    }
}
