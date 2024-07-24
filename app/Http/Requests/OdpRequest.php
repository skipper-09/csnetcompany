<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OdpRequest extends FormRequest
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
            'area_id' => 'required',
            'splitter' => 'required|integer',
            'latitude' => 'required',
            'longitude' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Odp Wajib Diisi',
            'area_id.required' => 'Area Wajib Diisi',
            'splitter.integer' => 'Inputkan Hanya Angka',
            'splitter.required' => 'Splitter Wajib Diisi',
            'latitude.required' => 'latitude Wajib Diisi',
            'longitude.required' => 'Longitude Wajib Diisi',
        ];
    }
}
