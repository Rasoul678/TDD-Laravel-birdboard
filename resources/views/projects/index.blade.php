@extends('layouts.app')

@section('content')
    <header class="row py-3">
        <h5 class="col-6 text-muted">My Projects</h5>
        <div class="col-6 text-right">
            <a href="{{url('/projects/create')}}" class="btn btn-primary text-dark shadow-sm border-0" style="background-color: #47CDFF">Add Project</a>
        </div>
    </header>
    <main class="row">
        @forelse($projects as $project)
            <div class="'col-sm-12 col-md-4">
                <div class="card shadow mt-4" style="height: 200px">
                    <div class="card-body">
                        <h3 class="card-title py-3 pl-2 border-left border-success" style="border-width: 5px !important; border-color: #47CDFF !important; margin-left: -20px !important;">
                            <a href="{{ url($project->path()) }}" class="text-dark card-link">
                                {{ $project->title }}
                            </a>
                        </h3>
                        <p class="card-text text-muted text-justify">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div>No projects yet!</div>
        @endforelse
    </main>
@endsection
