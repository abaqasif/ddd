@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Users List</h1>
    <p class="lead">Here's a list of all your users:</p>

        <table class="table table-condensed" style="width:90%">
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
    @foreach(App\User::all() as $user)

            <tr>
                <td>
                    {{$user->name}}
                </td>
                <td>{{$user->email}} </td>

                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>

            </tr>
        {{--<li>--}}
            {{--{{$user->name}} {{$user->email}}--}}
            {{--{!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}--}}
            {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
            {{--{!! Form::close() !!}--}}

        {{--</li>--}}

    @endforeach
    <hr>
    </div>

@stop