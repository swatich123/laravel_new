@extends('layouts.master')

@section('content')

    <h1>Books <a href="{{ url('book/books/create') }}" class="btn btn-primary pull-right btn-sm">Add New Book</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Bookname</th><th>Description</th><th>Author</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($books as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('book/books', $item->id) }}">{{ $item->bookname }}</a></td><td>{{ $item->description }}</td><td>{{ $item->author }}</td>
                    <td>
                        <a href="{{ url('book/books/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['book/books', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $books->render() !!} </div>
    </div>

@endsection
