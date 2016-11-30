@extends('layouts.app')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Security Module</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
@section('content')
    <div class="container">
    <h1>Pages List</h1>
    <p class="lead">Here's a list of all your forms:</p>


        <table class="table table-condensed" style="width:90%">
            <tr>
                <th>Page Name</th>
                <th>Page URL</th>
                <th></th>
                <th></th>
            </tr>
    @foreach(App\Page::all() as $page)
                <tr>
                    <td>
                        {{$page->name}}
                    </td>
                    <td> <a href="{{$page->url}}">{{$page->url}}</a>  </td>

                    <td> <a href="/page/{{$page->id}}/edit" class="btn btn-info">update</a></td>


                </tr>


    @endforeach
    <hr>

@stop