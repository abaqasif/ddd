
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                        You have access to following forms:
                        <hr>
                        @foreach(\App\Page::all() as $pages)
                            <li>{{$pages->name}} <a href="{{$pages->url}}">{{$pages->url}}</a>
                                <br>
                            </li>


                        @endforeach




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
