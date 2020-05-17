@extends('layouts.app')

@section('content')
    <h1>{{$project->title}}</h1>
    <p>{{$project->description}}</p>
    <a href="{{url('/projects')}}" class="btn btn-primary">Go Back</a>
@endsection
