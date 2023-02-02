<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        /**
     * Seed the application's database.
     *
     * @return void
     */
        public function run()
        {
        $this->call(PermissionTableSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TaskStatusSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(SalaryTypeSeeder::class);
        $this->call(SalarySeeder::class);
        $this->call(MachineSeeder::class);
        $this->call(PresenceConfigSeeder::class);
        }
}
