

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Topic /
                    @if($topic->id)
                        Edit #{{$topic->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($topic->id)
                    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                    <div class="form-group">
                        <label for="title-field">Title</label>
                        <input class="form-control" type="text" name="title"
                               required
                               id="title-field" value="{{ old('title', $topic->title ) }}" />
                    </div>
                        <div class="form-group">
                            <select name="category_id" id="" class="form-control" required>
                                <option value="" hidden disabled {{ $topic->id?'':'selected' }}>choose category</option>
                                @foreach($categories as $v)
                                    <option value="{{ $v->id }}"
                                            {{ $topic->category_id == $v->id?'selected':'' }}
                                       >{{ $v->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="body-field">Body</label>
                        <textarea name="body" id="editor" class="form-control"
                                  required
                                  rows="3">{{ old('body', $topic->body ) }}</textarea>
                    </div>


                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-ok"></span>Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('topics.index') }}">
                            <i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/simditor.css') }}" type="text/css">
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

    <script>
        $(function(){
            var editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '{{ route('topics.upload_image') }}',
                    params: { _token: '{{ csrf_token() }}' },
                    filekey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                },
                pasteImage: true,
            });
        })
    </script>
@stop