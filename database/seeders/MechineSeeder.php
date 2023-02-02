<?php

namespace Database\Seeders;

use App\Models\Mechine;
use Illuminate\Database\Seeder;

class MechineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mechine::create([
                'name' => 'X100-C',
                'ip' => '192.168.20.10',
                'password' => '1234',
                'port' => '80',
                'is_default' => 1
            ]);
    }
}
