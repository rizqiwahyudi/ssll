<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PresenceConfig;

class PresenceConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs = [
            [
                'time_in'           => '08:00:00',
                'time_out'          => '16:00:00',
                'tolerance_time_in' => '30',
                'tolerance_time_out'=> '30',
            ],
        ];

        foreach ($configs as $config) {
            PresenceConfig::create($config);
        }
    }
}
