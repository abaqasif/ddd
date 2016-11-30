@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add A Test </h1>

        <p class="lead"></p>
        <hr>

        {!! Form::open(['url' => 'production/batch/'.$batch->id.'/tests'] ) !!}

        <div class="form-group">
            {!! Form::label('test', 'Test ID', ['class' => 'control-label']) !!}
            {!! Form::text('id', null, ['class' => 'form-control']) !!}
            {{--{{ Form::select('test', $test[0], ['class' => 'form-control']) }}--}}
        </div>

        <div class="form-group">
            {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}
            {!! Form::text('value', null, ['class' => 'form-control']) !!}
        </div>


        {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>

    <div class="container">


        <table class="table table-condensed" style="width:90%">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>STANDARD</th>

            </tr>

            @foreach($tests as $test)
                <tr>
                    <td>{{$test->id}} </td>
                    <td>{{$test->name}}</td>
                    <td>{{$test->standard}}</td>
                </tr>
        @endforeach
    </div>
@stop
