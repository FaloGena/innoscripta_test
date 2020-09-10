@extends('layouts.main')
@section('content')
    <div class="row profile-info">
        <div class="col-lg-3">
            <span>Name: {{$user->name}}</span>
        </div>
        <div class="col-lg-3">
            <span>Surname: {{$user->surname}}</span>
        </div>
        <div class="col-lg-3">
            <span>Phone: {{$user->phone}}</span>
        </div>
        <div class="col-lg-3">
            <span>Email: {{$user->email ?? '-'}}</span>
        </div>
    </div>
    <div class="col-lg-12 profile-order-history__title">
        <span>Your order history</span>
    </div>
    <div class="row profile-order-history">
            @include('layouts.profile-orders')
    </div>
@endsection
