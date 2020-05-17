<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_project_can_have_tasks ()
    {
        $this->signIn();

        $project = factory('App\Project')->raw();

        $project = auth()->user()->projects()->create($project);

        $this->post($project->path() . '/tasks', ['body'=>'Test task']);

        $this->get($project->path() . '/tasks')->assertSee('Test task');
    }

    /**
     * @test
     */
    public function a_task_requires_a_body ()
    {
        $this->signIn();

        $project = factory('App\Project')->raw();

        $project = auth()->user()->projects()->create($project);

        $attributes = factory('App\Task')->raw(['body'=>'']);

        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors('body');
    }
}
