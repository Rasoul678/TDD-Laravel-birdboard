<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    /**
     * Add a task to the given  project.
     *
     * @param Project $project
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store (Project $project)
    {
        $this->authorize('update', $project);

        request()->validate(['body'=>'required']);

        $project->addTask(request('body'));

        return redirect($project->path());
    }

    /**
     * Update the project.
     *
     * @param Project $project
     * @param Task $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update (Project $project, Task $task)
    {
        $this->authorize('update', $task->project);

        request()->validate(['body'=>'required']);

        $task->update(['body'=>request('body')]);

        if(request()->has('completed'))
        {
            $task->complete();
        }

        return redirect($project->path());
    }
}
