<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mechine;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $machines = [
            [
                'name' => 'X100C',
                'ip' => '192.168.20.10',
                'password' => '1234',
                'port' => '80',
                'is_default' => '1'
            ],
        ];

        foreach ($machines as $machine) {
            Mechine::create($machine);
        }
    }
}
