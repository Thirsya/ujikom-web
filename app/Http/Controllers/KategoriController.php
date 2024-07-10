<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_kategori', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%');
        }

        $kategori = $query->paginate(10);

        return view('kategori-surat.kategori')->with([
            'kategori' => $kategori,
        ]);
    }


    public function create()
    {
        $lastId = Kategori::max('id') + 1;
        return view('kategori-surat.create-kategori', compact('lastId'));
    }

    public function store(StoreKategoriRequest $request)
    {
        $data = $request->validated();

        Kategori::create($data);

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil ditambahkan');
    }

    public function show(Kategori $kategori)
    {
        //Tidak Dipakai
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori-surat.edit-kategori', compact('kategori'));
    }

    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        $data = $request->validated();

        $kategori->update($data);

        return redirect()->route('kategori.index')->with('success', 'Data berhasil diupdate');
    }


    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
            return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) { // 23000 is the SQL state code for integrity constraint violation
                return redirect()->route('kategori.index')->with('error', 'Data tidak dapat dihapus karena terkait dengan data lain.');
            } else {
                return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}