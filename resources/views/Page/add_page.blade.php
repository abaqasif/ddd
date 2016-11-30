@extends('layouts.app')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Security Module</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
@section('content')
    <div class="container">
    <h1>Add new page</h1>
    <p class="lead"></p>
    <hr>

    {!! Form::open(['route' => 'page.store']) !!}

    <div class="form-group">
        {!! Form::label('pg_name', 'Page name:', ['class' => 'control-label']) !!}
        {!! Form::text('pg_name', null, ['class' => 'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('url', 'page URL:', ['class' => 'control-label']) !!}
        {!! Form::url('url', null, ['class' => 'form-control']) !!}
    </div>




    {!! Form::submit('Add Page', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
    </div>
@stop
