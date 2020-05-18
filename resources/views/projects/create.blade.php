@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-7">
            <div class="card-body">
                <form method="POST" action="/projects" >
                        <h1 class="text-center">Let's start something new!</h1>
                        @include('projects.form', [
                                'project'=>new App\Project,
                                'buttonText'=>'Create Project'
                                ])
                </form>
            </div>
        </div>
    </div>
@endsection

