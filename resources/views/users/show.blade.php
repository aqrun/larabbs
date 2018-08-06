
@extends('layouts.app')
@section('title', $user->name . ' 的个人中心')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="card panel-default">
                <div class="card-body">
                    <div class="media" style="flex-direction:column;">
                        <div align="center">
                            <img class="img-thumbnail img-fluid" alt="" src="https://fsdhubcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/600/h/600" width="300px" height="300px"/>
                        </div>
                        <div class="clearfix"></div>
                        <div class="media-body">
                            <hr/>
                            <h4>
                                <string>个人简介</string>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <hr>
                            <h4><strong>注册于</strong></h4>
                            <p>January 01 1901</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="card panel-default">
                <div class="card-body">
                    <span>
                        <h1 class="card-title float-left" style="font-size:30px">
                            {{ $user->name }} <small>{{ $user->email }}</small>
                        </h1>
                    </span>
                </div>
            </div>
            <hr/>
            <div class="card card-default">
                <div class="card-body">
                    empty
                </div>
            </div>
        </div>


    </div>

@stop
