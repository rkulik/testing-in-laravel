<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class CallTasksApiTest
 * @package Tests\Feature
 *
 * @author René Kulik <info@renekulik.de>
 */
class ViewApiTasksTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_view_a_list_of_tasks()
    {
        $task1 = factory(Task::class)->create();
        $task2 = factory(Task::class)->create();

        $this->json('GET', '/api/v1/tasks')
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $task1->title])
            ->assertJsonFragment(['title' => $task2->title])
            ->assertJsonMissing(['title' => 'missing title']);
    }
}
