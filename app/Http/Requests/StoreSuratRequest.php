<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'no_surat' => 'required|unique:surat,no_surat',
            'id_kategori' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'file_surat' => 'required|file|mimes:pdf|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'no_surat.required' => 'Nomor surat wajib diisi.',
            'no_surat.unique' => 'Nomor surat sudah digunakan.',
            'id_kategori.required' => 'Kategori wajib dipilih.',
            'judul.required' => 'Judul surat wajib diisi.',
            'file_surat.required' => 'File surat wajib diunggah.',
            'file_surat.mimes' => 'File surat harus berformat PDF.',
            'file_surat.max' => 'Ukuran file surat maksimal 2MB.',
        ];
    }
}
