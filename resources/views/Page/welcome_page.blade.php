@extends('layouts.app')

@section('content')
    <div class="container">

    <h1>Page From</h1>
    <p class="lead"></p>
    <hr>

    <a href="{{ route('page.create') }}" class="btn btn-info">Add Page</a>
    <a href="{{ url('page/updateList') }}" class="btn btn-info">Update Pages</a>
    <a href="{{ url('page/delete') }}" class="btn btn-info">Delete Pages</a>
    <a href="{{ route('page.index') }}" class="btn btn-info">All Pages</a>

</div>
@stop