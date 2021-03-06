<?php

namespace Tests\Feature;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class ViewTasksTest
 * @package Tests\Feature
 *
 * @author René Kulik <info@renekulik.de>
 */
class ViewTasksTest extends TestCase
{
    use DatabaseMigrations;

    /**
     *
     */
    public function testUserCanViewListOfTasks()
    {
        $task1 = factory(Task::class)->create();
        $task2 = factory(Task::class)->create();

        $this->get('/')
            ->assertStatus(200)
            ->assertSee($task1->title)
            ->assertSee($task2->title);
    }
}
