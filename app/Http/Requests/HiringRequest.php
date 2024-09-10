<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HiringRequest extends FormRequest
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
            'name'=>'required',
            'qualification' =>'required',
            'category_job' => 'required',
            'job_location' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Wajib Diisi', 
            'qualification.required' => 'Deskripsi Wajib Diisi', 
            'category_job.required' => 'Kategori Wajib Diisi', 
            'job_location.required' => 'Lokasi Wajib Diisi', 
        ];
    }
}
