@extends('layouts.main')
@section('content')
    <h3 class="checkout-heading">Order information</h3>
    <h5 class="checkout-descr">Fill all required fields to send your order</h5>
    <form action="javascript:void(null);" method="POST" class="col-12 checkout-form">
        {{csrf_field()}}
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="First Name *"
                           value="{{Auth::user()->name ?? ""}}" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number (digits only) *"
                           value="{{Auth::user()->phone ?? ""}}" required>
                </div>
                @guest
                    <div class="form-group">
                        <input type="text" name="street" class="form-control" placeholder="Street *" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="floor" class="form-control" placeholder="Floor">
                    </div>
                @endguest
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="text" name="surname" class="form-control" placeholder="Second Name *"
                           value="{{Auth::user()->surname ?? ""}}" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email"
                           value="{{Auth::user()->email ?? ""}}">
                </div>
                @guest
                    <div class="form-group">
                        <input type="text" name="house" class="form-control" placeholder="House *" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="apartment" class="form-control" placeholder="Apartment">
                    </div>
                @endguest
            </div>
            @guest
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" placeholder="Comment">
                    </div>
                </div>
            @endguest
        </div>
        @auth
            <div class="col-lg-12 address-select__title">
                <h5 class="checkout-descr">Select one of your address</h5>
            </div>
            <input type="hidden" name="address_id" class="address">
            @include('layouts.profile.profile-addresses')
        @endauth
        <div class="col-12 checkout-form__submit-button">
            @if ($session_order['total_amount'] > 0)
                <button type="submit" class="btn btn-primary btn-lg">Send order</button>
            @else
                <a class="empty-cart-redirect" href="/">Buy something first</a>
            @endif
        </div>
    </form>
    @auth
        @include('layouts.profile.new-address-modal')
    @endauth
@endsection
