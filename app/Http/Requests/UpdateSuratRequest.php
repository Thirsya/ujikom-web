<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSuratRequest extends FormRequest
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
        $id = $this->route('surat')->id;
        return [
            'no_surat' => 'required|unique:surat,surat' . $id
        ];
    }

    public function messages()
    {
        return [
            'no_surat.required' => 'surat Wajib Diisi',
            'no_surat.unique' => 'surat Sudah Ada',
        ];
    }
}
