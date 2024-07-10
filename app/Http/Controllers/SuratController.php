<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Surat;
use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use App\Imports\SuratsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SuratController extends Controller
{

    public function index(Request $request)
    {
        $query = Surat::with('kategori');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('no_surat', 'like', '%' . $search . '%')
                ->orWhere('judul', 'like', '%' . $search . '%');
        }

        $surat = $query->paginate(10);

        return view('arsip-surat.surat')->with([
            'surat' => $surat,
        ]);
    }


    public function create()
    {
        $surat = Surat::all();
        $kategori = Kategori::all();
        return view('arsip-surat.create-surat')->with(['$surat' => $surat, 'kategori' => $kategori]);
    }

    public function store(StoreSuratRequest $request)
    {
        $data = $request->validated();
        $data['waktu'] = now();

        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')->store('file_surat', 'public');
        }

        Surat::create($data);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil disimpan.');
    }


    public function show(Surat $surat)
    {
        //Tidak Dipakai
    }

    public function edit($id)
    {
        $arsipSurat = Surat::findOrFail($id);
        $kategoriSurat = Kategori::all();
        return view('arsip-surat.edit-surat', compact('arsipSurat', 'kategoriSurat'));
    }

    public function update(UpdateSuratRequest $request, $id)
    {
        $arsipSurat = Surat::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            // Hapus file lama jika ada
            if ($arsipSurat->file_surat && Storage::disk('public')->exists($arsipSurat->file_surat)) {
                Storage::disk('public')->delete($arsipSurat->file_surat);
            }
            // Simpan file baru
            $arsipSurat->file_surat = $request->file('file_surat')->store('arsip_surat', 'public');
        }

        $arsipSurat->save();

        return redirect()->route('surat.index')
            ->with('success', 'Arsip surat berhasil diperbarui.');
    }

    public function download($id)
    {
        $arsipSurat = Surat::findOrFail($id);
        $filePath = storage_path('app/public/' . $arsipSurat->file_surat);

        return response()->download($filePath);
    }

    public function destroy($id)
    {
        $arsipSurat = Surat::findOrFail($id);

        // Hapus file dari storage jika ada
        if ($arsipSurat->file_surat && Storage::disk('public')->exists($arsipSurat->file_surat)) {
            Storage::disk('public')->delete($arsipSurat->file_surat);
        }

        // Hapus entri dari database
        $arsipSurat->delete();

        return redirect()->route('surat.index')
            ->with('success', 'Data surat berhasil dihapus.');
    }
}
