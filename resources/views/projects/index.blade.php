@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6 text-right">
            <a href="{{url('/projects/create')}}" class="btn btn-success">Create New Project</a>
        </div>
    </div>
    <ul>
        @forelse($projects as $project)
            <li>
                <a href={{ $project->path() }}>{{ $project->title }}</a>
            </li>
        @empty
            <h1>No Project Yet!</h1>
        @endforelse
    </ul>
@endsection
