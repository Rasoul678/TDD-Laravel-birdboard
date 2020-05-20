@if(count($activity->changes['after']) == 1)
    {{ $activity->user->email }} updated the <strong>{{ key($activity->changes['after']) }}</strong> of the project
@else
    {{ $activity->user->email }} updated the project
@endif
