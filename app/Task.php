<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $casts = [
        'completed'=>'boolean'
    ];

    protected $touches = ['project'];

    public function project ()
    {
        return $this->belongsTo(Project::class);
    }

    public function path ()
    {
        return "/projects/". $this->project->id . "/tasks/" . $this->id;
    }

    public function complete ()
    {
        $this->update(['completed'=>true]);

        $this->recordActivity('completed_task');
    }

    public function incomplete ()
    {
        $this->update(['completed'=>false]);

        $this->recordActivity('incompleted_task');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activity ()
    {
        return $this->morphMany(Activity::class, 'subject')->orderByDesc('updated_at');
    }

    /**
     * @param $description
     */
    public function recordActivity($description)
    {
        $this->activity()->create([
            'description'=>$description,
            'project_id'=>$this->project_id
        ]);
    }
}
