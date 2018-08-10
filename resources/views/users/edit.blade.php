@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card card-default col-md-10">
        <div class="card-header bg-white">
            <h4 class="card-title" style="padding-top:2rem">
                <i class="glyphicon glyphicon-edit"></i>{{ __('users.edit_profile') }}
            </h4>
        </div>

        @include('common.error')
        
        <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}" method="POST" 
                enctype="multipart/form-data"
                accept-charset="UTF-8">
                <input name="_method" type="hidden" value="PUT"/>
                @csrf

                <div class="form-group">
                    <label for="name-field">用户名</label>
                    <input class="form-control" name="name" type="text" value="{{ old('name', $user->name) }}" id="name-field"/>
                </div>
                <div class="form-group">
                    <label for="email-field">邮箱</label>
                    <input class="form-control" name="email" id="email-field" type="text" value="{{ old('email', $user->email) }}"/>
                </div>
                <div class="form-group">
                    <label for="introduction-field">个人简介</label>
                    <textarea cols="30" name="introduction" rows="3" id="introduction-field"
                              class="form-control">{{ old('introduction', $user->introduction) }}</textarea>
                </div>
                <div class="form-group">
                    <label class="avatar-label">用户头像</label>
                    <input type="file" name="avatar"/>
                    
                    @if($user->avatar)
                        <br/>
                        <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
                    @endif
                </div>
                <div class="well sell-sm">
                    <button class="btn btn-primary" type="submit">保存</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection