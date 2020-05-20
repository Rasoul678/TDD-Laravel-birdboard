<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Project extends Model
{
    protected $guarded = [];

    public $old = [];

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
        return $this->hasMany(Activity::class)->orderByDesc('updated_at');
    }

    /**
     * @param $description
     */
    public function recordActivity($description)
    {
        $this->activity()->create([
            'description'=>$description,
            'changes'=> $this->activityChanges($description)
        ]);
    }

    protected function activityChanges ($description)
    {
        if($description === 'updated')
        {
            return [
                'before'=>Arr:: except(array_diff($this->old, $this->getAttributes()), ['updated_at', 'created_at']),
                'after'=>Arr::except($this->getChanges(), ['updated_at', 'created_at'])
            ];
        }
    }
}
