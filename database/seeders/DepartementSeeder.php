<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departement;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departements = [
            [
                'name' => 'Politeknik Keuangan Negara Sekolah Tinggi Akuntansi Negara (PKN STAN)',
                'description' => 'STAN berada di bawah naungan Badan Pendidikan dan Pelatihan Keuangan, Kementerian Keuangan.'
            ],
            [
                'name' => 'Sekolah Tinggi Intelijen Negara (STIN)',
                'description' => 'STIN berada di bawah naungan Badan Intelijen Negara (BIN). Para taruna akan mempelajari ilmu intelijen yang nantinya akan diterapkan untuk persatuan dan kesatuan negara.'
            ],

        ];

        foreach ($departements as $departement) {
            Departement::create($departement);
        }
    }
}
