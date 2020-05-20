@extends('layouts.app')

@section('content')
    <header class="row py-3">
        <h5 class="col-6 text-muted mt-2">My Projects</h5>
        <div class="col-6 text-right">
            <a href="{{url('/projects/create')}}" class="btn btn-primary text-dark shadow-sm border-0" style="background-color: #47CDFF">Add Project</a>
        </div>
    </header>
    <main class="row">
        @forelse($projects as $project)
            <div class="'col-sm-12 col-md-4">
                @include('projects.card')
            </div>
        @empty
            <h3 class="container">No projects yet!</h3>
        @endforelse
    </main>
@endsection
