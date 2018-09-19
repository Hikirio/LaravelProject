<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                Добавить новую запись
                </div>
                <hr>
                <div class="panel-body">
                    <!-- Отображение ошибок проверки ввода -->
                @include('common.errors')

                <!-- Форма новой задачи -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Имя задачи -->
                        <div class="form-group">
                            <label for="task" class="col-sm-3 control-label">Title</label>

                            <div class="col-sm-6">
                                <input type="text" rows="45" name="name" id="task-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task" class="col-sm-3 control-label">Text</label>

                            <div class="col-sm-6">
                                <textarea rows="10" cols="45" name="text" id="task-name" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task" class="col-sm-3 control-label">Author</label>

                            <div class="col-sm-6">
                                <input type="text" name="author" id="task-name" class="form-control">
                            </div>
                        </div>

                        <!-- Кнопка добавления задачи -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Добавить задачу
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>

                @if (count($tasks) > 0)
                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <!-- Заголовок таблицы -->
                            <thead>
                            <th>Tasks</th>

                            </thead>

                            <!-- Тело таблицы -->
                            <tbody>
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($tasks as $task)
                                <tr>
                                    <!-- Имя задачи -->
                                    <td class="table-text">
                                        <div>{{ $task->id }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $task->text }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $task->author }}</div>
                                    </td>

                                    <!-- Task Delete Button -->
                                    <td>
                                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                        <form action="{{ url('/task/edit/'.$task->id) }}" method="get">
                                            {{ csrf_field() }}
                                            {{ method_field('EDIT') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-edit"></i>Edit
                                            </button>
                                        </form>
                                    </td>

                                    <td>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
            </div>
        @endif
        <!-- TODO: Текущие задачи -->
@endsection
