

@extends('layouts.app')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Security Module</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
@section('content')
    <div class="container">
    <h1>Update Page</h1>


    {!! Form::model($page, [
       'method' => 'PATCH',
       'route' => ['page.update', $page->id]
   ]) !!}
    <div class="form-group">
        {!! Form::label('pg_name', 'Page Name:', ['class' => 'control-label']) !!}
        {!! Form::text('pg_name', $page->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('url', 'URL:', ['class' => 'control-label']) !!}
        {!! Form::url('url', $page->url, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Update Page', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
</div>
@endsection