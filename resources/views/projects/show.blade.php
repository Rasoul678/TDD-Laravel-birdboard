@extends('layouts.app')

@section('content')
    <header class="row py-3">
        <h5 class="col-6 text-muted mt-2">
            <a href="{{url('/projects')}}" class="text-muted card-link">My Projects</a> / {{ $project->title }}
        </h5>
        <div class="col-6 text-right">
            <a href="{{$project->path() . '/edit'}}" class="btn btn-primary text-dark shadow-sm border-0" style="background-color: #47CDFF">Edit Project</a>
        </div>
    </header>
    <main>
        <div class="row">
            <div class="col-12 col-md-8">
                <h5 class="col-6 text-muted p-0 mt-2">Tasks</h5>
                {{--  Tasks --}}
                @forelse($project->tasks as $task)
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="card-text">
                                <form action="{{$task->path()}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-row">
                                        <div class="col-11">
                                            <input name="body" value="{{ $task->body }}" type="text" class="form-control {{$task->completed ? 'text-success' : ''}}" style="font-size: 22px">
                                        </div>
                                        <div class="col-1">
                                            <div class="form-check text-center">
                                                <input name="completed" type="checkbox" class="form-check-input mt-3" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-text text-muted">No tasks yet!</h5>
                        </div>
                    </div>
                @endforelse
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="card-text">
                            <form action="{{ $project->path() . '/tasks' }}" method="POST">
                                @csrf
                                <div>
                                    <input type="text" name="body" placeholder="Add a new task..." class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <h5 class="col-6 text-muted p-0 mt-5">General Notes</h5>
                {{--  General Notes --}}
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <form action="{{ $project->path() }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <textarea
                                    name="notes"
                                    class="w-100 border-0"
                                    rows="5"
                                    placeholder="Anything special that you want to make a note of?"
                                    style="font-size: 20px">{{ $project->notes }}</textarea>
                                <button
                                    type="submit"
                                    class="btn btn-primary text-dark shadow-sm border-0"
                                    style="background-color: #47CDFF">
                                    Save
                                </button>
                            </form>
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
