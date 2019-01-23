@extends('./layouts/layout')

@section('content')

<div class="container">
  <form action="{{route('todos.save', ['id' => $todo->id])}}" method="post">
    <div class="form-group">
      <label>Update todo</label>
      {{ csrf_field() }}
      <input type="text" class="form-control" value="{{$todo->todo}}" name="todo">
    </div>
  </form>
</div>

@endsection
