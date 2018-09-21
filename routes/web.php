<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Вывести панель с задачами
 */
Route::get('/', 'TaskController@grid');
//Route::get('/task/edit/{task}', 'TaskController@edit');
Route::get('/task', 'TaskController@task_grid');//task/index index
Route::post('/banners/upload', 'ImageController@upload');
Route::get('/banners', 'ImageController@index');
Route::post('/task/create', 'TaskController@create');
//add

/**
 * Изменить задачу
 */
Route::get('/task/edit/{task}', 'TaskController@edit');
Route::put('/task/update/{task}', 'TaskController@update');
//Route::GET('/task/{task}/edit', 'TaskController@edit');
//Route::PUT('/task/{task}/update', 'TaskController@update');

/**
 * Удалить задачу
 */
Route::delete('/task/{task}', 'TaskController@destroy');//task/delete

Auth::routes();

//Route::get('/tasks', 'HomeController@index')->name('Admin Panel');
