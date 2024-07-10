<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKategoriRequest extends FormRequest
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
        $id = $this->route('kategori')->id;
        return [
            'nama_kategori' => 'required|regex:/^[a-zA-Z]+$/u|unique:kategori,kategori,' . $id
        ];
    }

    public function messages()
    {
        return [
            'nama_kategori.required' => 'Kategori Wajib Diisi',
            'nama_kategori.unique' => 'Kategori Sudah Ada',
            'nama_kategori.regex' => 'Kategori tidak boleh karakter @!_?',
        ];
    }
}
