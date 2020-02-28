@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/home" class="btn btn-primary mb-4">&lt; Back</a>

                <div class="card">
                    <div class="card-header">
                        {{$task->title}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$task->description}}</p>
                    </div>
                </div>

                <div class="form-inline"><a href="/tasks/{{$task->id}}/edit" class="btn btn-primary">Edit</a>
                    <form method="post" action="/tasks/{{$task->id}}">
                        @csrf
                        @method('DELETE')

                        <button class = "btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
