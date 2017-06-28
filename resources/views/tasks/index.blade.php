@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <h1>All Tasks</h1>
        <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item">
                    {{ $task->title }}
                    <form method="POST" class="pull-right" action="/tasks/{{ $task->id }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-default">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-12">
        <h2>Create New Task</h2>
        <form method="POST" action="/tasks">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@stop