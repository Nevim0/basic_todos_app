@extends('layouts.app')

@section('content')
    <a href="/home" class="btn btn-primary mb-4">&lt; Back</a>

    <div class="card">
        <div class="card-header">
            {{$task->title}}
        </div>
        <div class="card-body">
            <p class="card-text">{{$task->description}}</p>
        </div>
    </div>

    <div class="form-inline pt-2"><a href="/tasks/{{$task->id}}/edit" class="btn btn-primary mr-2">Edit</a>
        <form method="post" action="/tasks/{{$task->id}}">
            @csrf
            @method('DELETE')

            <button class = "btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
@endsection
