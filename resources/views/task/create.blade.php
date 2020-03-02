@extends('layouts.app')

@section('content')
    <a href="/home" class="btn btn-primary mb-4"> &lt; Back</a>
    <div class="card">
        <div class="card-header">New task</div>

        <div class="card-body">
            <form action='/tasks' method='post'>
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" autocomplete="off" value="{{old('title')}}">
                </div>
                @error('title') <p style="color: red">{{$message}}</p> @enderror

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="5" name="description" id="description" >{{old('description')}}</textarea>
                </div>
                @error('description') <p style="color: red">{{$message}}</p> @enderror

                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
