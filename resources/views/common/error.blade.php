@if (count($errors) > 0)
<div class="alert alert-danger mt-3">
    <h4>有错误发生</h4>
    <ul>
        @foreach ($errors->all() as $error)
            <li><i class="fa fa-times"></i> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif

