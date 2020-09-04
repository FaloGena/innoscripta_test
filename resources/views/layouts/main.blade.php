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
<div class="container">
    <div class="row top-bar">
        <div class="col-2 logo">
            <a href="/">
                <img src="/images/logo.png" alt="Pizza You logo">
            </a>
        </div>
        @auth
            <div class="col-3">
                <span>{{Auth::user()->name}}</span>
                <span>{{Auth::user()->surname}}</span>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @endauth
        @guest
            <div class="col-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                    Log in
                </button>
                <a href="/register">Sign up</a>
            </div>
        @endguest
    </div>
    @yield('content')
</div>
@include('layouts.modals.login')
@include('layouts.resource-loading.js')
</body>
</html>
