@extends('layouts.app')


@section('content')
    <div class="container">
        <hr>
        <h1>Inventory</h1>
        <h3>From Factory to Warehouse</h3>



        {!! Form::open(['route' => 'batch.store' ]) !!}

        <div class="form-group">
            {!! Form::label('item', 'Item ID', ['class' => 'control-label']) !!}
            {!! Form::text('item' ,null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('qty', 'Quantity', ['class' => 'control-label']) !!}
            {!! Form::text('qty' ,null, ['class' => 'form-control' , 'width' => '50%']) !!}
        </div>


        {!! Form::submit('Transfer', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}



        <table class="table table-condensed" style="width:90%">
            <tr>
                <th>ID</th>
                <th>BRAND</th>
                <th>TYPE</th>
                <th>SHADE</th>
                <th>SIZE</th>
                <th>PRICE</th>
                <th>MIN_STOCK</th>
                <th>FACTORY STOCK</th>
                <th>WAREHOUSE STOCK</th>
            </tr>

            {{--@foreach($items as $rm)--}}
                {{--<tr>--}}

                {{--</tr>--}}
        {{--@endforeach--}}

    </div>
@stop