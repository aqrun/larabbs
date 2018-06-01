@extends('layouts.app')
@section('title', $user->name . '\'s home page')

@section('content')
<div class="row">
    <div class="col-md-3 user-info">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="media">
                    <div align="center">
                        <img  src="{{ $user->avatar }}"
                              width="300px" height="300px"
                              alt="" class="thumbnail img-responsive">
                    </div>
                    <div class="media-body">
                        <hr/>
                        <h4><strong>Profile</strong></h4>
                        <p>{{ $user->introduction }}</p>
                        <hr>
                        <h4><strong>Register At:</strong></h4>
                        <p>{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <span>
                    <h1 class="panel-title pull-left" style="font-size:30px">
                        {{ $user->name }} <small>{{ $user->email }}</small>
                    </h1>
                </span>
            </div>
        </div>

        <hr>

        <div class="panel panel-default">
            <div class="panel-body">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="">Ta 的话题</a></li>
                    <li><a href="">Ta 的回复</a></li>
                </ul>
                @include('users._topics', ['topics' => $user->topics()->recent()->paginate(5)])


            </div>
        </div>

    </div>

</div>
@stop