<?php

use Illuminate\Database\Seeder;

/**
 * Class TasksTableSeeder
 *
 * @author René Kulik <info@renekulik.de>
 */
class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Task::class, 5)->create();
    }
}
