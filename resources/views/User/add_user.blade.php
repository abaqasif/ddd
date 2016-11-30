@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Add a New User</h1>
    <p class="lead"></p>
    <hr>

    {!! Form::open(['route' => 'user.store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('pw', 'Password:', ['class' => 'control-label']) !!}
        {!! Form::password('secret',['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Add User', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
    </div>
@stop



