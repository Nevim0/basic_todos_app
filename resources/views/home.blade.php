@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href='/tasks/create' class="btn btn-primary mb-4">Create a new task</a>
            <ul class="list-group">
                @forelse($tasks as $task)
                    <li class="list-group-item {{$task->completed? 'list-group-item-success' : 'list-group-item-light'}} d-flex justify-content-between align-items-center">
                        <a href="/tasks/{{$task->id}}">
                            {{$task->title}}
                        </a>

                        @if($task->completed)
                            Completed
                        @else
                            <form method="post" action="/tasks/{{$task->id}}/complete">
                                @csrf
                                @method('PUT')

                                <button class = "btn btn-success" type="submit">Complete</button>
                            </form>
                        @endif
                    </li>
                @empty
                    No tasks yet.
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
