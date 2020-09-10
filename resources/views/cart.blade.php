@extends('layouts.main')
@section('content')
    <h3 class="cart-heading">Change or confirm your order to proceed</h3>
    <div class="row">
        <div class="col-lg-8 cart-products">
            @include('layouts.cart-position')
        </div>
        <div class="col-lg-4 cart-total">
            <div class="col-lg-12 cart-total__main-price">
                <span>Temporary price:</span>
                <span class="value changeable">
                    <span>{{$session_order['total_price']}}</span>
                    <i class="fa fa-{{$currency}}"></i>
                </span>
            </div>
            <div class="col-lg-12 cart-total__delivery-price">
                <span>Delivery cost:</span>
                <span class="value">
                    <span>{{$deliveryCost}}</span>
                    <i class="fa fa-{{$currency}}"></i>
                </span>
            </div>
            <div class="col-lg-12 cart-total__total-price">
                <span>Total price:</span>
                <span class="value changeable">
                    <span>{{$session_order['total_price'] + $deliveryCost}}</span>
                    <i class="fa fa-{{$currency}}"></i>
                </span>
            </div>
            <div class="to-checkout">
                <a href="/checkout">To checkout</a>
            </div>
        </div>
    </div>
@endsection
