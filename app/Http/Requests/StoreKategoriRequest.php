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
            'nama_kategori' => 'required|unique:kategori,nama_kategori|string',
            'keterangan' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'nama_kategori.required' => 'Kategori Wajib Diisi',
            'nama_kategori.unique' => 'Kategori Sudah Ada',
            'nama_kategori.string' => 'Kategori Harus Berupa String',
            'keterangan.string' => 'Keterangan Harus Berupa String',
        ];
    }
}
