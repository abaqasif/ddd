

@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Update User</h1>


    {!! Form::model($user, [
      'method' => 'PATCH',
      'route' => ['user.update', $user->id]
  ]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
        {!! Form::text('title', $user->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('pw', 'Password:', ['class' => 'control-label']) !!}
        {!! Form::password('secret',['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
</div>
@endsection

