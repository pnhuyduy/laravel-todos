@extends('./layouts/layout')

@section('title', $title)

@section('content')
  <div class="container">
    <h1 class="text-center">{{$title}}</h1>
    <div>
      <nav class="nav nav-pills nav-fill">
        <a class="nav-item nav-link {{Route::is('todos') ? 'active' : ''}}" href="{{route('todos')}}">All</a>
        <a class="nav-item nav-link {{Route::is('todos.showCompleted') ? 'active' : ''}}" href="{{route('todos.showCompleted')}}">Completed</a>
      </nav>
    </div>
    <hr>
    <form action="/create/todo" method="post">
      <div class="form-group">
        <label>Todo</label>
        {{ csrf_field() }}
        <input type="text" class="form-control" name="todo">
      </div>
    </form>
    @foreach ($todos as $key => $todo)
      <h3>{{$todo->todo}}
      @if (!$todo->completed)
        <a href="{{route('todos.completed', ['id' => $todo->id])}}" class="btn btn-success">Mark as completed</a>
      @else
        <span class="badge badge-primary">Completed</span>
      @endif
      <a href="{{route('todos.update', ['id' => $todo->id])}}" class="btn btn-info">Edit</a> <a href="{{route('todos.delete', ['id' => $todo->id])}}" class="btn btn-danger">Delete</a></h3>
      <hr>
    @endforeach
  </div>
@endsection
