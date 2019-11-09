<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LaraBBS') - Laravel</title>
    <meta name="description" content="@yield('description', 'LaraBBS 爱好者社区')">
    <script>
        window.g = window.g || {};
        g.baseUrl = '/';
</script>
    <link href="{{ asset('static/plugins/fontawesome-free-5.11.2-web/css/all.min.css') }}" rel="stylesheet">
    @yield('styles')
    @include('layouts._css')
</head>
<body>
<div id="app" class="{{ route_class() }}-page">
    @include('layouts._header')

    <div class="container">
        @include('shared._messages')
        @yield('content')
    </div>
    @include('layouts._footer')

</div>
<script src="{{ asset('static/plugins/simditor-2.3.28/scripts/jquery.min.js') }}"></script>
@yield('scripts')
@include('layouts._js')
</body>
</html>