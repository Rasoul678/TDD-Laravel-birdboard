@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-7">
            <div class="card-body">
                <form method="POST" action="{{url('/projects')}}" >
                    @csrf
                    <h1>Create a Project</h1>
                    <div class="form-group">
                        <label for="title" class="h5">Title</label>
                        <input type="text"  name="title" id="title" placeholder="Title" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="description" class="h5">Description</label>
                        <textarea name="description" id="description" placeholder="Description" class="form-control" required></textarea>
                    </div>
                    <input
                        type="submit"
                        value="Create Project"
                        class="btn btn-primary text-dark shadow-sm border-0"
                        style="background-color: #47CDFF"
                    />
                    <a href="{{url('/projects')}}" class='btn btn-danger'>Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection

