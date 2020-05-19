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
    }

    public function incomplete ()
    {
        $this->update(['completed'=>false]);
    }
}
