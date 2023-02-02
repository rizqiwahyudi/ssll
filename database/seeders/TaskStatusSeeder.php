<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskStatus;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task_statuses = [
            [
                'name' => 'Not yet',
            ],
            [
                'name' => 'On progress',
            ],
            [
                'name' => 'Accepted',
            ],

        ];

        foreach ($task_statuses as $task_status) {
            TaskStatus::create($task_status);
        }
    }
}
