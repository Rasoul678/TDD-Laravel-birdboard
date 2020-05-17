@extends('layouts.app')

@section('content')
    <header class="row py-3">
        <h5 class="col-6 text-muted mt-2">
            <a href="{{url('/projects')}}" class="text-muted card-link">My Projects</a> / {{ $project->title }}
        </h5>
        <div class="col-6 text-right">
            <a href="{{url('/projects/create')}}" class="btn btn-primary text-dark shadow-sm border-0" style="background-color: #47CDFF">Add Project</a>
        </div>
    </header>
    <main>
        <div class="row">
            <div class="col-12 col-md-8">
                <h5 class="col-6 text-muted p-0 mt-2">Tasks</h5>
                {{--  Tasks --}}
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="card-text">Lorem ipsum</p>
                    </div>
                </div>
                <h5 class="col-6 text-muted p-0 mt-5">General Notes</h5>
                {{--  General Notes --}}
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <textarea class="w-100 border-0" rows="5">Lorem ipsum</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                @include('projects.card')
            </div>
        </div>
    </main>
@endsection
