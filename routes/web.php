<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', [
  'uses' => 'TodosController@index',
  'as' => 'todos'
]);

Route::get('/list/completed', [
  'uses' => 'TodosController@showCompletedTodos',
  'as' => 'todos.showCompleted'
]);

Route::get('/todo/delete/{id}', [
  'uses' => 'TodosController@delete',
  'as' => 'todos.delete'
]);

Route::get('/todo/update/{id}', [
  'uses' => 'TodosController@update',
  'as' => 'todos.update'
]);

Route::post('/todo/save/{id}', [
  'uses' => 'TodosController@save',
  'as' => 'todos.save'
]);

Route::post('create/todo', [
  'uses' => 'TodosController@store',
  'as' => 'todos.create'
]);

Route::get('/todo/completed/{id}',[
  'uses' => 'TodosController@completed',
  'as' => 'todos.completed'
]);
