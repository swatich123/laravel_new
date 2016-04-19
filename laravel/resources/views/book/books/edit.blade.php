@extends('layouts.master')

@section('content')

    <h1>Edit Book</h1>
    <hr/>

    {!! Form::model($book, [
        'method' => 'PATCH',
        'url' => ['book/books', $book->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('bookname') ? 'has-error' : ''}}">
                {!! Form::label('bookname', 'Bookname: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('bookname', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('bookname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('author') ? 'has-error' : ''}}">
                {!! Form::label('author', 'Author: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('author', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('author', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('publisher') ? 'has-error' : ''}}">
                {!! Form::label('publisher', 'Publisher: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('publisher', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('publisher', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('published on') ? 'has-error' : ''}}">
                {!! Form::label('published on', 'Published On: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('published on', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('published on', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection