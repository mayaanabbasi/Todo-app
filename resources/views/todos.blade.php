@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-lg-offset-3">
            <form action="/create/todo" method="post">
                {{csrf_field()}}
                <input type="text" placeholder="Create a Todo" name="todo" class="form-control input-lg">
            </form>
        </div>
    </div>
    <br>

    @foreach ($todos as $todo)
        {{ $todo->todos }} <a href="{{ route('todo.delete', ['id'=>$todo->id]) }}" class="btn btn-danger">X</a> <a href="{{ route('todo.update', ['id'=>$todo->id]) }}" class="btn btn-info">Update</a>
        @if(!$todo->completed)
            <a href="{{ route('todo.completed', [ 'id'=> $todo->id]) }}" class="btn btn-success">Mark as completed</a>
        @else
            <span class="text-success">Completed!</span>
        @endif
        <hr>
    @endforeach

@stop