@extends('layouts.app')

@section('title', 'Topics List')

@section('content')
<div class="row">

    <div class="col-md-9 topic-list">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="nav nav-pills">
                    <li class="active" role="presentation"><a href="">Last Comments</a></li>
                    <li role="presentation"><a href="E">Newest</a></li>
                </ul>
            </div>
            <div class="panel-body">
                @include('topics._topic_list', ['topics'=>$topics])
                {!! $topics->appends(Request::except('pgae'))->render() !!}
            </div>

        </div>
    </div>

    <div class="col-md-3 sidebar">
        @include('topics._sidebar')
    </div>

</div>

@endsection