@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel pane-default col-md-10 col-md-offset-1">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-edit"></i>Edit Profile</h4>
        </div>

        @include('common.error')

        <div class="panel-body">
            <form action="{{ route('users.update', $user->id) }}"
                  enctype="multipart/form-data"
                  method="post">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="">User name</label>
                    <input type="text" class="form-control" name="name" id="name-field"
                       value="{{ old('name', $user->name) }}"/>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" id="email-field"
                        value="{{ old('email', $user->email) }}">
                </div>
                <div class="form-group">
                    <label for="introduction-field">Introduction</label>
                    <textarea name="introduction" id="introduction-field" rows="3"
                              class="form-control">{{ old('introduction', $user->introduction) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="" class="avatar-label">Avatar</label>
                    <input type="file" name="avatar">

                    @if($user->avatar)
                        <br/>
                        <img src="{{ $user->avatar }}" alt="" class="thumbnail img-responsive" width="200">
                    @endif

                </div>
                <div class="well well-sm">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>


    </div>
</div>
@stop