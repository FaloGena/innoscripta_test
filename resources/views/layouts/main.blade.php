<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>Pizza You</title>
    @include('layouts.resource-loading.css')
</head>
<body>
<div class="page-container">
<div class="content-wrap">
    <div class="container main-container">
        @include('layouts.top-bar')
        @yield('content')
    </div>
</div>
@include('layouts.footer')
</div>
@guest
@include('layouts.modals.login')
@endguest
@include('layouts.resource-loading.js')
</body>
</html>
