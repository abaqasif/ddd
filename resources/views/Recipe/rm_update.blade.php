@extends('layouts.app')


@section('content')
    <div class="container">

        {{--<h3>Recipe ID: {!! $recipe->id !!}</h3>--}}
        {{--<h5>Item Brand: {{$recipe->brand}}</h5>--}}
        {{--<h5>Item Type:  {{$recipe->type}}</h5>--}}
        {{--<h5>Item shade: {{$recipe->shade}}</h5>--}}
        {{--<h5>BatchSize: {{$recipe->batchsize}}</h5>--}}



        <div class = "container">
            <p class="lead">List of all your Raw Materials:</p>
            <table class="table table-condensed" style="width:90%">
                <tr>
                    <th>SERIAL NO</th>
                    <th>TYPE</th>
                    <th>QUANTITY</th>
                    <th>UNIT</th>
                    <th>RATE</th>

                    <th></th>
                    <th></th>
                </tr>


                @foreach($rms as $rm)
                    <tr>

                        <td>{{$rm->rm_id}}</td>
                        <td>{{$rm->type}}</td>
                        <td>{{$rm->qty}}</td>
                        <td>{{$rm->uom}}</td>
                        <td>{{$rm->rate}}</td>


{{--<td>--}}
                        {{--{!!  Form::open(['method' => 'POST','url' => ['production/recipe/'.$rm->recipe_id.'/rm/'.$rm->rm_id ]])  !!}--}}

                        {{--{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}--}}

                        {{--{!! Form::close() !!}--}}
{{--</td>--}}
                        <td><a href="{{url('production/recipe/'.$rm->recipe_id.'/rm/'.$rm->rm_id.'/edit')}}" class="btn btn-info">Update</a>
                        {{--<td><a href="" class="btn btn-danger">Delete</a>--}}


                        <td>
                            {!! Form::open(['method' => 'DELETE', 'url' => ['production/recipe/'.$rm->recipe_id.'/rm/'.$rm->rm_id ] ]) !!}
                            {!! Form::submit('Delete Recipe', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>



                    </tr>
            @endforeach



        </div>

@stop