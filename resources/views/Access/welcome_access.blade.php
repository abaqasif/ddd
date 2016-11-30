@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Page Access Form</h1>
    <p class="lead"> </p>
    <hr>

    <a href="{{ route('access.create') }}" class="btn btn-info">Add Page Right</a>
    <a href="{{ url('access/updateList') }}" class="btn btn-info">Update Page Rights</a>
    <a href="{{ url('access/delete') }}" class="btn btn-info">Delete Page Right</a>
    <a href="{{ route('access.index') }}" class="btn btn-info">All Page Rights</a>
        </div>

@stop