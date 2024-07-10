<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Surat;
use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use App\Imports\SuratsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SuratController extends Controller
{

    public function index(Request $request)
    {
        $surat = Surat::with('kategori')->paginate(20);
        return view('surat')->with([
            'surat' => $surat,
        ]);
    }

    public function create()
    {
        $surat = Surat::all();
        return view('create-surat')->with(['$surat' => $surat]);
    }

    // public function store(StoreKelurahanRequest $request)
    // {
    //     Kelurahan::create([
    //         'kelurahan' => $request->kelurahan,
    //         'id_kecamatan' => $request->id_kecamatan,
    //     ]);

    //     return redirect()->route('kelurahan.index')
    //         ->with('success', 'Kelurahan created successfully.');
    // }

    public function show(Surat $surat)
    {
        $surat = Surat::findOrFail($surat);
        return view('show-surat', compact('surat'));
    }

    // public function edit(Kelurahan $kelurahan)
    // {
    //     $kecamatans = Kecamatan::all();
    //     return view('master data.kelurahan.edit')->with(
    //         [
    //             'kelurahan' => $kelurahan,
    //             'kecamatans' => $kecamatans
    //         ]
    //     );
    // }

    // public function update(UpdateKelurahanRequest $request, Kelurahan $kelurahan)
    // {
    //     $kelurahan->update($request->all());

    //     return redirect()->route('kelurahan.index')
    //         ->with('success', 'Kelurahan updated successfully.');
    // }

    // public function destroy(Kelurahan $kelurahan)
    // {
    //     try {
    //         $kelurahan->forceDelete();
    //         return redirect()->route('kelurahan.index')->with('success', 'Hapus Data Kelurahan Sukses');
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         $error_code = $e->errorInfo[1];
    //         if ($error_code == 1451) {
    //             return redirect()->route('kelurahan.index')
    //                 ->with('error', 'Tidak Dapat Menghapus Kelurahan Yang Masih Digunakan Oleh Kolom Lain');
    //         } else {
    //             return redirect()->route('kelurahan.index')->with('success', 'Hapus Data Kelurahan Sukses');
    //         }
    //     }
    // }

}
