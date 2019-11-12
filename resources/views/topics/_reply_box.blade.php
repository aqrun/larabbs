@include('shared._error')

<div class="reply-box">
  <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
    @csrf
    <input type="hidden" name="topic_id" value="{{ $topic->id }}"/>
    <div class="form-group">
      <textarea class="form-control" name="content" rows="3"></textarea>
    </div>
    <button class="btn btn-primary btn-sm" type="submit">
      <i class="fa fa-share mr-1"></i> 回复
    </button>
  </form>
</div>
<hr/>
