<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Surat::insert(
            [
                [
                    'no_surat' => '2022/PD3/TU/001',
                    'id_kategori' => '1',
                    'judul' => 'Nota Dinas WFH',
                    'waktu' => '2023-06-21 17:23'
                ],
                [
                    'no_surat' => '2022/PD2/TU/022',
                    'id_kategori' => '2',
                    'judul' => 'Undangan Halal Bi Halal',
                    'waktu' => '2023-04-21 18:23'
                ],
            ]
        );
    }
}
