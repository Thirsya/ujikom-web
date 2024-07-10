<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriRequest extends FormRequest
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
            'nama_kategori' => 'required|unique:kategori,kategori|regex:/^[a-zA-Z]+$/u',
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
