<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    /**
     * @return string
     */
    public function path()
    {
        return "/projects/{$this->id}";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks ()
    {
        return $this->hasMany('App\Task');
    }

    /**
     * @param $body
     * @return Model
     */
    public function addTask ($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity ()
    {
        return $this->hasMany(Activity::class);
    }

    public function recordActivity($type)
    {
        Activity::create([
            'project_id'=>$this->id,
            'description'=>$type
        ]);
    }
}
