<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::paginate(20);
        return view('kategori-surat.kategori')->with([
            'kategori' => $kategori,
        ]);
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('kategori-surat.create-kategori')->with(['$kategori' => $kategori]);
    }

    public function store(StoreKategoriRequest $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ];

        Kategori::create($data);

        return redirect()->route('kategori.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Kategori $kategori)
    {
        return view('master data.kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        $kategori = Kategori::find($kategori);
        return view('kategori-surat.edit-kategori', ['kategori' => $kategori]);
    }

    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        $data = [
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ];

        Kategori::find($kategori)->update($data);

        return redirect()->route('kategori.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Kategori $kategori)
    {
        Kategori::find($kategori)->delete();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }

}
