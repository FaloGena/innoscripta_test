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
                           value="{{Auth::user()->name ?? ""}}">
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number (digits only) *"
                           value="{{Auth::user()->phone ?? ""}}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email"
                           value="{{Auth::user()->email ?? ""}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="text" name="surname" class="form-control" placeholder="Second Name *"
                           value="{{Auth::user()->surname ?? ""}}">
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Address *">
                </div>
                <div class="form-group">
                    <input type="text" name="comment" class="form-control" placeholder="Comment">
                </div>
            </div>
            <div class="col-12 checkout-form__submit-button">
                <button type="submit" class="btn btn-primary btn-lg">Send order</button>
            </div>
        </div>
    </form>

@endsection
