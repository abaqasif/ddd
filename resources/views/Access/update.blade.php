

@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Update Right</h1>

        {{--{!! Form::open( [--}}
          {{--'method' => 'PATCH',--}}
          {{--'url' => ['/access/'.$user->id]--}}
      {{--]) !!}--}}

    {!! Form::model($user, [
      'method' => 'PATCH',
      'route' => ['access.update', $user->id]
  ]) !!}

    <div class="form-group">
        {!! Form::label('user_id', 'User ID:' . $user->id, ['class' => 'control-label']) !!}

    </div>
        <div class="form-group">
            {!! Form::label('user_id', 'User Name:' . $user->name, ['class' => 'control-label']) !!}

        </div>

    <div class="form-group">
        {!! Form::label('page_id', 'Select page:', ['class' => 'control-label']) !!}
        {!!  Form::select('page_id',  ['1' => 'User Form', '2' => 'Page Form','3' => 'Access Form', '4' => 'Production Form']) !!}

    </div>

    {!! Form::submit('Update Right', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
</div>
@endsection