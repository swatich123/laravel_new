@extends('layouts.master')

@section('content')

    <h1>Book</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Bookname</th><th>Description</th><th>Author</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $book->id }}</td> <td> {{ $book->bookname }} </td><td> {{ $book->description }} </td><td> {{ $book->author }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection