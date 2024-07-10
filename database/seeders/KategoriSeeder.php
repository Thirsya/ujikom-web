<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::insert(
            [
                [
                    'nama_kategori' => 'Pengumuman',
                    'keterangan' => 'Surat-surat yang terkait dengan pengumuman.'
                ],
                [
                    'nama_kategori' => 'Undangan',
                    'keterangan' => 'Undangan rapat, koordinasi, dsb.'
                ],
            ]
        );
    }
}
