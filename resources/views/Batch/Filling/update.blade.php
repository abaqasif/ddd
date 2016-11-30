@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Update filling </h1>

        <p class="lead"></p>
        <hr>

        {!!  Form::open(['method' => 'PATCH', 'url' => ['/production/batch/'.$filling->batch_id.'/fill/'.$filling->id]])  !!}

        <div class="form-group">
            {!! Form::label('packing', 'Packing : ' . $filling->packing_id, ['class' => 'control-label']) !!}
            {{--{{ Form::select('packing', $packing, array('class' => 'form-control')) }}--}}
        </div>

        <div class="form-group">
            {!! Form::label('qty', 'Quantity', ['class' => 'control-label']) !!}
            {!! Form::text('qty',$filling->qty , ['class' => 'form-control']) !!}
        </div>


        {!! Form::submit('Done', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@stop
