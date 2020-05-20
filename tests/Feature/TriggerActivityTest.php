<?php

namespace Tests\Feature;

use App\Task;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TriggerActivityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function creating_a_project_triggers_activity ()
    {
        $project = ProjectFactory::create();

        $this->assertCount(1, $project->activity);

        tap($project->activity->last(), function ($activity) {
            $this->assertEquals('created_project', $activity->description);

            $this -> assertNull($activity -> changes);
        });
    }

    /**
     * @test
     */
    public function updating_a_project_triggers_activity ()
    {
        $project = ProjectFactory::create();

        $originalTitle = $project->title;

        $project->update(['title'=>'Changed']);

        $this->assertCount(2, $project->activity);

        tap($project->activity->last(), function ($activity) use($originalTitle){
            $this->assertEquals('updated_project', $activity->description);

            $expected = [
               'before'=>['title'=>$originalTitle],
                'after'=>['title'=>'Changed']
            ];

            $this->assertEquals($expected, $activity->changes);
        });
    }

    /**
     * @test
     */
    public function creating_a_new_task_triggers_project_activity ()
    {
        $project = ProjectFactory::create();

        $project->addTask('Test task');

        $this->assertCount(2, $project->activity);

        tap($project->activity->last(), function ($activity){
            $this->assertEquals('created_task', $activity->description);
            $this->assertInstanceOf(Task::class, $activity->subject);
            $this->assertEquals('Test task', $activity->subject->body);
        });
    }

    /**
     * @test
     */
    public function deleting_a_task_triggers_project_activity ()
    {
        $project = ProjectFactory::withTasks(1)->create();

        $project->tasks->first()->delete();

        $this->assertCount(3, $project->activity);
    }

    /**
     * @test
     */
    public function completing_a_task_triggers_project_activity ()
    {
        $project = ProjectFactory::ownedBy($this->signIn())->withTasks(1)->create();

        $this->patch($project->tasks->first()->path(), [
            'body'=>'task_body',
            'completed'=>true
        ]);

        $this->assertCount(3, $project->activity);

        tap($project->activity->last(), function ($activity){
            $this->assertEquals('completed_task', $activity->description);
            $this->assertInstanceOf(Task::class, $activity->subject);
        });
    }

    /**
     * @test
     */
    public function incompleting_a_task_records_project_activity ()
    {
        $project = ProjectFactory::ownedBy($this->signIn())->withTasks(1)->create();

        $this->patch($project->tasks->first()->path(), [
            'body'=>'task_body',
            'completed'=>true
        ]);

        $this->assertCount(3, $project->activity);

        $this->patch($project->tasks->first()->path(), [
            'body'=>'task_body',
            'completed'=>false
        ]);

        $project->refresh();

        $this->assertCount(4, $project->activity);

        $this->assertEquals('incompleted_task', $project->activity->last()->description);
    }

}
