<?php

namespace Tests\Feature;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class WorkWithTasksTest
 * @package Tests\Feature
 *
 * @author René Kulik <info@renekulik.de>
 */
class WorkWithTasksTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_create_tasks()
    {
        $task = factory(Task::class)->make();
        
        $this->post('/tasks', $task->toArray());

        $this->get('/')
            ->assertStatus(200)
            ->assertSee($task->title);
    }

    /** @test */
    public function a_user_can_delete_tasks()
    {
        $task = factory(Task::class)->create(['id' => 1]);

        $this->delete('/tasks/1');

        $this->get('/')
            ->assertStatus(200)
            ->assertDontSee($task->title);
    }
}
