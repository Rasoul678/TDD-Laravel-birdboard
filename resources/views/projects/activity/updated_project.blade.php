@if(count($activity->changes['after']) == 1)
    {{ $activity->user->name }} updated the <strong>{{ key($activity->changes['after']) }}</strong> of the project
@else
    {{ $activity->user->name }} updated the project
@endif
