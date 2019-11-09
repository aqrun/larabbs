@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="md-12">
            <div class="card">
                <div class="card-head">
                    <h4>{{ $topic->title }}</h4>
                </div>
                <div class="card-body">
                    <div class="text-second">
                        {{ $topic->user->name }}
                    </div>
                    <div>{{ $topic->body }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection