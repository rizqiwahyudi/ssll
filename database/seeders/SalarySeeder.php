<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salary;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $salaries = [
            [
                'date'              => '2021-08-25',
                'nominal'           => '1800000',
                'user_id'           => '1',
                'salary_type_id'    => '1',
            ],
            [   'date'              => '2021-08-25',
                'nominal'           => '1800000',
                'user_id'           => '2',
                'salary_type_id'    => '1',
            ],
            [   'date'              => '2021-08-25',
                'nominal'           => '15000000',
                'user_id'           => '3',
                'salary_type_id'    => '2',
            ]
        ];

        foreach ($salaries as $salary) {
            Salary::create($salary);
        }
    }
}
