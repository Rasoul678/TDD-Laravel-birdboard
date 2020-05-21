<div class="card shadow mt-4" style="height: 200px">
    <div class="card-body">
        <h3 class="card-title py-3 pl-2 border-left border-success" style="border-width: 5px !important; border-color: #47CDFF !important; margin-left: -20px !important;">
            <a href="{{ url($project->path()) }}" class="text-dark card-link">
                {{ $project->title }}
            </a>
        </h3>
        <p class="card-text text-muted text-justify">{{ Str::limit($project->description, 100) }}</p>
    </div>
    @can('manage', $project)
    <div class="card-body text-right">
        <form action="{{ $project->path() }}" method="POST">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="btn btn-primary text-light shadow-sm border-0"
                style="background-color: #E54335"
            >Delete</button>
        </form>
    </div>
    @endcan
</div>
