<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            [
                'task_name' => 'Make Frontend SKPHP',
                'user_id' => '3',
                'description' => '',
                'start_date' => Carbon::now(),
                'deadline' => '2021-08-20',
                'task_status_id' => '1',
                'created_by' => '2',
            ],
            [
                'task_name' => 'Make Backend Sergap',
                'user_id' => '3',
                'description' => '',
                'start_date' => Carbon::now(),
                'deadline' => '2021-08-22',
                'task_status_id' => '1',
                'created_by' => '2',
            ],

        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
