@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-7">
            <div class="card-body">
                <form method="POST" action="{{ $project->path() }}" >
                    @method('PATCH')
                    <h1 class="text-center">Edit project</h1>
                    @include('projects.form', ['buttonText'=>'Update Project'])
                </form>
            </div>
        </div>
    </div>
@endsection

