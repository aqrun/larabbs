@extends('layouts.app')
@section('title', $user->name . '\'s home page')

@section('content')
<div class="row">
    <div class="col-md-3 user-info">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="media">
                    <div align="center">
                        <img  src="https://fsdhubcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/600/h/600"
                              width="300px" height="300px"
                              alt="" class="thumbnail img-responsive">
                    </div>
                    <div class="media-body">
                        <hr/>
                        <h4><strong>Profile</strong></h4>
                        <p>some description</p>
                        <hr>
                        <h4><strong>Register At:</strong></h4>
                        <p>20180220348</p>
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
                empty
            </div>
        </div>

    </div>

</div>
@stop