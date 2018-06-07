@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')

    <div class="row">

        <div class="col-md-3 hidden-sm author-info">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        Author: {{ $topic->user->name }}
                    </div>
                    <hr>
                    <div class="media">
                        <div align="center">
                            <a href="{{ route('users.show', $topic->user->id) }}">
                                <img src="{{ $topic->user->avatar }}" alt="" class="thumbnail img-responsive"
                                     width="300" height="300"
                                >
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9 topic-content">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="text-center">{{$topic->title}}</h1>
                </div>
                <div class="article-meta text-center">
                    {{ $topic->created_at->diffForHumans() }} .
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                    {{ $topic->reply_count }}
                </div>

                <div class="topic-body">{!! $topic->body !!}</div>

                @can('update', $topic)
                <div class="oprate">
                    <hr>
                    <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-default btn-xs" role="button">
                        <i class="glyphicon glyphicon-edit">Edit</i>
                    </a>
                    <form action="{{ route('topics.destroy', $topic->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-default btn-xs pull-left" type="submit" style="margin-left:6px;">
                            <i class="glyphicon glyphicon-trash"></i>Delete
                        </button>
                    </form>
                </div>
                @endcan

            </div>


            <div class="panel panel-default topic-reply">
              <div class="panel-body">
                @include('topics._reply_box', ['topic' => $topic])
                @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->get()])
              </div>
            </div>


        </div>

    </div>

@endsection
