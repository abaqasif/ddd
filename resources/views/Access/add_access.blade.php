@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>Add new page right</h1>
    <p class="lead"></p>
    <hr>

    {!! Form::open(['route' => 'access.store']) !!}

    {!! Form::label('user_id', 'User ID:', ['class' => 'control-label']) !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}

    <div class="form-group">
        {!! Form::label('right_num', 'Select page:', ['class' => 'control-label']) !!}
        {!!  Form::select('page_id', ['1' => 'User Form', '2' => 'Page Form', '3' => 'Access Rights Form', '4' => 'Production Setup']) !!}

    </div>

    {!! Form::submit('Add Right', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <br>

        <table class="table table-condensed" style="width:90%">
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>User Email</th>

            </tr>
        @foreach(\App\User::all() as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>{{$user->email}} </td>


                </tr>

        @endforeach



            <table class="table table-condensed" style="width:90%">
                <tr>
                    <th>Page ID</th>
                    <th>Page Name</th>
                    <th>Page URL</th>

                </tr>
                @foreach(App\Page::all() as $page)
                    <tr>
                        <td>
                            {{$page->id}}
                        </td>
                        <td>
                            {{$page->name}}
                        </td>
                        <td> <a href="{{$page->url}}">{{$page->url}}</a>  </td>




                    </tr>


                @endforeach
                <hr>

    </div>
@stop
