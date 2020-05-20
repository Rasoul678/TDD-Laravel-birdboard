<?php


    namespace App;


    use Illuminate\Support\Arr;

    trait RecordsActivity
    {
        /**
         *  The project's old attributes.
         *
         * @var array
         */
        public $oldAttributes = [];

        /**
         * Boot the trait.
         */
        public static function bootRecordsActivity()
        {
            static::updating(function($model){
                $model->oldAttributes = $model->getOriginal();
            });

            foreach (self ::recordableEvents() as $event) {
                static::$event(function ($model) use ($event){
                    $model->recordActivity($model->activityDescription($event));
                });
            }
        }

        /**
         *  Get the description of the activity.
         *
         * @param $description
         * @return string
         */
        protected function activityDescription ($description)
        {
            return "{$description}_". strtolower(class_basename($this));
        }


        /**
         *  Fetch the model event's that should trigger activity.
         *
         * @return array
         */
        protected static function recordableEvents()
        {
            if (isset(static ::$recordableEvents)) {
                return static ::$recordableEvents;
            }

            return  ['created', 'updated', 'deleted'];
        }


        /**
         *  The activity feed for the model
         *
         * @return mixed
         */
        public function activity ()
        {
            return $this->morphMany(Activity::class, 'subject')->orderByDesc('updated_at');
        }

        /**
         *  Record activity for a model
         *
         * @param $description
         */
        public function recordActivity($description)
        {
            $this->activity()->create([
                'description'=>$description,
                'changes'=> $this->activityChanges(),
                'project_id'=>class_basename($this) === 'Project' ? $this->id : $this->project_id
            ]);
        }

        /**
         * Fetch the changes to the model
         *
         * @return array
         */
        protected function activityChanges ()
        {
            if($this->wasChanged())
            {
                return [
                    'before'=>Arr:: except(array_diff($this->oldAttributes, $this->getAttributes()), ['updated_at', 'created_at']),
                    'after'=>Arr::except($this->getChanges(), ['updated_at', 'created_at'])
                ];
            }
        }
    }
