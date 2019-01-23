<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index() {
      $todos = Todo::all();
      return view('todos', [
        'todos' => $todos,
        'title' => "Todo list"
      ]);
    }

    public function showCompletedTodos() {
      $todos = Todo::where('completed', '=', 1)->get();

      return view('todos', [
        'todos' => $todos,
        'title' => 'Completed todos'
      ]);
    }

    public function store(Request $request) {
      $todo = new Todo;

      $todo->todo = $request->todo;
      $todo->save();

      return redirect()->route('todos');
    }

    public function delete($id) {
      $todo = Todo::find($id);
      $todo->delete();

      return redirect()->route('todos');
    }

    public function update($id) {
      $todo = Todo::find($id);

      return view('update', [
        'todo' => $todo
      ]);
    }

    public function save(Request $request, $id) {
      $todo = Todo::find($id);

      $todo->todo = $request->todo;
      $todo->save();

      return redirect()->route('todos');
    }

    public function completed($id) {
      $todo = Todo::find($id);

      $todo->completed = 1;
      $todo->save();

      return redirect()->route('todos');
    }
}
