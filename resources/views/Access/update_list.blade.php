@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Rights List</h1>
    <p class="lead">Here's a list of all your users and their access rights:</p>
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

                    <td>  <a href="{{url('/access/'.$user->id.'/edit')}}" class="btn btn-info">update</a>
                    </td>

                </tr>


    @endforeach
    <hr>
</div>
@stop