@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-default col-md-10 col-md-offset-1">
        <div class="card-title">
            <h4>
                <i class="glyphicon glyphicon-edit"></i>编辑个人资料
            </h4>
        </div>

        <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8">
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
                    <textarea cols="30" id="" name="" rows="3" id="introduction-field"
                              class="form-control">{{ old('introduction', $user->introduction) }}</textarea>
                </div>
                <div class="well sell-sm">
                    <button class="btn btn-primary" type="submit">保存</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
