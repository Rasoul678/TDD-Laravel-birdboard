@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-3">
        <a href="{{url('/projects/create')}}">Create New Project</a>
    </div>
    <div class="row">
        @forelse($projects as $project)
            <div class="'col-sm-12 col-md-4">
                <div class="card shadow mt-3" style="height: 200px">
                    <div class="card-body">
                        <h3 class="card-title py-2">{{ $project->title }}</h3>
                        <p class="card-text text-muted text-justify">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div>No projects yet!</div>
        @endforelse
    </div>
@endsection
