<?php

namespace Tests\Feature;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class BrowseTasksTest
 * @package Tests\Feature
 *
 * @author René Kulik <info@renekulik.de>
 */
class BrowseTasksTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_browse_tasks()
    {
        $task = factory(Task::class)->create();

        $this->get('/')
            ->assertStatus(200)
            ->assertSee($task->title);
    }
}
