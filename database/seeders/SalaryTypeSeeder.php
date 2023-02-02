<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SalaryType;

class SalaryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalaryType::create([
            'name'              => 'Basic Salary'
        ]);
        SalaryType::create([
            'name'              => 'Allowance'
        ]);
    }
}
