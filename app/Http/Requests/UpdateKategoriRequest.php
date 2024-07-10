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
            'nama_kategori' => 'required|string|unique:kategori,nama_kategori,' . $id,
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
