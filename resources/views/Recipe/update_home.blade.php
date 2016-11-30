@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>All Recipes</h1>
        <p class="lead">Here's a list of all your Recipes:</p>

        <div class = "container">
            <table class="table table-condensed" style="width:90%">
                <tr>
                    <th>ID</th>
                    <th>BRAND</th>
                    <th>TYPE</th>
                    <th>SHADE</th>
                    <th>UOM</th>
                    <th>ACTIVE</th>
                    <th>TYPE_ID</th>
                    <th>BATCHSIZE</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($recipes as $recipe)
                    <tr>

                        <td>{{$recipe->id}}</td>
                        <td>{{$recipe->brand}}</td>
                        <td>{{$recipe->type}}</td>
                        <td>{{$recipe->shade}}</td>
                        <td>{{$recipe->UOM}}</td>
                        <td>{{$recipe->active}}</td>
                        <td>{{$recipe->type_id}}</td>
                        <td>{{$recipe->batchsize}}</td>




                        <td><a href="/production/recipe/{{$recipe->id}}/edit" class="btn btn-info">Update Recipe</a>

                        <td><a href="{{url( 'production/recipe/'.$recipe->id.'/rm' ) }}"  class="btn btn-info">Update Raw Materials</a>
                        <td><a href="{{url('production/recipe/'.$recipe->id.'/rm/create')}}" class="btn btn-info">Add Raw Material</a>



                    </tr>
            @endforeach
        </div>
        <hr>





    </div>
@stop