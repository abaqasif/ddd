@extends('layouts.app')


@section('content')
    <div class="container">
    <h1>User Form</h1>

    <hr>


    <a href="{{ route('user.create') }}" class="btn btn-info">Add User</a>
    <a href="{{ url('user/updateList') }}" class="btn btn-info">Update User</a>
    <a href="{{ url('user/delete') }}" class="btn btn-info">Delete Users</a>
    <a href="{{ route('user.index') }}" class="btn btn-info">All Users</a>


</div>
@stop