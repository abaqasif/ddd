@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Rights List</h1>
    <p class="lead">Here's a list of all your page rights</p>
    <hr>

        <table class="table table-condensed" style="width:90%">
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Page ID</th>
                <th>Page Name</th>

            </tr>
    @foreach($users as $user)

                <tr>
                    <td>
                        {{$user->user_id}}
                    </td>
                    <td>{{$user->user_name}} </td>

                    <td>
                        {{$user->page_id}}
                    </td>
                    <td>{{$user->page_name}} </td>

                  <td>  <a href="/access/{{$user->id}}/edit" class="btn btn-info">update</a>
                    </td>
<td> {!! Form::open(['method' => 'DELETE','route' => ['access.destroy', $user->id],'style'=>'display:inline']) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}</td>
                </tr>



            @endforeach

    </div>
@stop
