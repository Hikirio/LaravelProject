<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Вывести панель с задачами
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/task', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks
    ]);
});

Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'text' => 'required|max:255',
        'author' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/task')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->text = $request->text;
    $task->author = $request->author;

    $task->save();

    return redirect('/task');
    // Создание задачи...
});
/**
 * Изменить задачу
 */
Route::get('/task/edit/{task}', 'TaskController@edit');

/**
 * Удалить задачу
 */
Route::delete('/task/{task}', 'TaskController@destroy');

Auth::routes();

//Route::get('/tasks', 'HomeController@index')->name('Admin Panel');
