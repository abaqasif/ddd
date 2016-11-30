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
                    <td><a href="/user/{{$user->id}}/edit" class="btn btn-info">update</a>
                    </td>

                </tr>


    @endforeach
    <hr>
</div>
@stop