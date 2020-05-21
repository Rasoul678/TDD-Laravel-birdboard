@if(count($activity->changes['after']) == 1)
    <strong>{{ $activity->user->name }}</strong> updated the <strong>{{ key($activity->changes['after']) }}</strong> of the project
@else
    <strong>{{ $activity->user->name }}</strong> updated the project
@endif
