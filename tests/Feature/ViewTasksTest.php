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

    /** @test */
    public function a_user_can_view_a_list_of_tasks()
    {
        $task = factory(Task::class)->create();

        $this->get('/')
            ->assertStatus(200)
            ->assertSee($task->title);
    }
}
