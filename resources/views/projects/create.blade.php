@extends('layouts.app')

@section('content')
    <form method="POST" action="{{url('/projects')}}" >
        @csrf
        <h1>Create a Project</h1>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"  name="title" id="title" placeholder="Title" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Description" class="form-control"></textarea>
        </div>
        <input type="submit" value="Create Project" class="btn btn-primary" />
        <a href="{{url('/projects')}}" class='btn btn-danger'>Cancel</a>
    </form>
@endsection

