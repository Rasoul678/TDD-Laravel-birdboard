<div class="card mt-4 shadow-sm" style="height: 500px; overflow: hidden">
    <div class="card-body">
        <h3 class="card-title text-center">Activities</h3>
        @foreach($project->activity as $activity)
            <hr>
        <div class="d-flex justify-content-between">
            <h6 class="card-text">
                @include("projects.activity.{$activity->description}")
            </h6>
            <h6 class="text-muted">
                {{ $activity->created_at->diffForHumans(null, true) }}
            </h6>
        </div>

        @endforeach
    </div>
</div>
