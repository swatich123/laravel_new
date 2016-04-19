@extends('layouts.master')

@section('content')

    <h1>Tasks <a href="{{ url('tasks/tasks/create') }}" class="btn btn-primary pull-right btn-sm">Add New Task</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Project Name</th><th>Name</th><th>Slug</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($tasks as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('tasks/tasks', $item->id) }}">{{ $item->swati->name }}</a></td><td>{{ $item->name }}</td><td>{{ $item->slug }}</td>
                    <td>
                        <a href="{{ url('tasks/tasks/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['tasks/tasks', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $tasks->render() !!} </div>
    </div>

@endsection
