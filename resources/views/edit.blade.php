@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                {{--<div class="panel-heading">--}}
                {{--New Task--}}
                {{--</div>--}}
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
                                <input type="text" name="name" value="{{$task->name}}" id="task-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task" class="col-sm-12 control-label">Text</label>

                            <div class="col-sm-6">
                                <input type="text" name="text" value="{{$task->text}}" id="task-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task" class="col-sm-3 control-label">Author</label>

                            <div class="col-sm-6">
                                <input type="text" name="author"value="{{$task->author}}" id="task-name" class="form-control">
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
                @endsection