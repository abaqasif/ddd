@extends('layouts.app')


@section('content')
    <div class="container">
        <hr>
        <h2> Add Raw Materials:</h2>
        <h3> For Recipe : {{$rec->id}}</h3>
        {{--{!! Form::open(['url' => '/production/recipe/'.$rec.'/rm/store' ]) !!}--}}
        {!! Form::open(['url' => '/production/recipe/'.$rec->id.'/rm' ]) !!}

        <div class="form-group">
            {!! Form::label('RM_ID', 'RM_ID', ['class' => 'control-label']) !!}
            {!! Form::text('id',null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('qty', 'Quantity:', ['class' => 'control-label']) !!}
            {!! Form::text('qty',null, ['class' => 'form-control']) !!}
        </div>
        {{--{!! Form::open(['url' => '/production/recipe/'.$rec.'/rm/store' ]) !!}--}}
        {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

        {{--{!! Form::open(['url' => '/production/recipe/'.$rec.'/rm/done_store' ]) !!}--}}
        {{--{!! Form::submit('Done', ['class' => 'btn btn-primary']) !!}--}}
        {{--{!! Form::close() !!}--}}

        <h1>Raw Materials in this Recipe:</h1>
        <table class="table table-condensed" style="width:90%">
            <tr>
                <th>SERIAL NO</th>
                <th>DESCRIPTION</th>
                <th>UNIT</th>
                <th>QUANTITY</th>

            </tr>

            @foreach($raw_mat as $raw)
                <tr>

                    <td>{{$raw->rm_id}}</td>
                    <td>{{$raw->desc}}</td>

                    <td>{{$raw->UOM}}</td>
                    {{--<td>{{$raw->rate}}</td>--}}
                    <td>{{$raw->qty}}</td>


                </tr>
            @endforeach

<h3>All Raw Materials</h3>
            <table class="table table-condensed" style="width:90%">
                <tr>
                    <th>SERIAL NO</th>
                    <th>DESCRIPTION</th>
                    <th>UNIT</th>

                </tr>

                @foreach($rms as $rm)
                    <tr>

                        <td>{{$rm->id}} </td>
                        <td>{{$rm->desc}}</td>
                        <td>{{$rm->UOM}}</td>

                    </tr>
        @endforeach


    </div>
@stop