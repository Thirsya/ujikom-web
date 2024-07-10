<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'no_surat' => 'required|unique:kategori',
        ];
    }

    public function messages()
    {
        return [
            'no_surat.required' => 'Kategori Wajib Diisi',
            'no_surat.unique' => 'Kategori Sudah Ada',
        ];
    }
}
