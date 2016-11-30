@extends('layouts.app')


@section('content')
    <div class="container">
        <hr>
        <h2> Select the item you want to make batch of and batch size:</h2>



        {!! Form::open(['route' => 'batch.store' ]) !!}

        <div class="form-group">
            {!! Form::label('item', 'Item ID', ['class' => 'control-label']) !!}
            {!! Form::text('item' ,null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('batchsize', 'Batch Size', ['class' => 'control-label']) !!}
            {!! Form::text('size' ,null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('gw', 'Gross Weight', ['class' => 'control-label']) !!}
            {!! Form::text('gw' ,null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('ew', 'Empty Weight', ['class' => 'control-label']) !!}
            {!! Form::text('ew' ,null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('order_no', 'Order #', ['class' => 'control-label']) !!}
            {!! Form::text('order_no' ,null, ['class' => 'form-control']) !!}
        </div>




        {!! Form::submit('Select', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}



        <table class="table table-condensed" style="width:90%">
            <tr>
                <th>ID</th>
                <th>BRAND</th>
                <th>TYPE</th>
                <th>SHADE</th>
            </tr>

            @foreach($items as $rm)
                <tr>

                    <td>{{$rm->id}} </td>
                    <td>{{$rm->brand}}</td>
                    <td>{{$rm->type}}</td>
                    <td>{{$rm->shade}}</td>
                </tr>
        @endforeach

    </div>
@stop