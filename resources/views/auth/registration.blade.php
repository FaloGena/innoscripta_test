@extends('layouts.main')
@section('content')
    <h3 class="register-heading">Registration form</h3>
    <h5 class="register-descr">You can sign up to be able to see your order history.</h5>
    <form action="javascript:void(null);" method="POST" class="col-12 registration-form">
        {{csrf_field()}}
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="First Name *">
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number (digits only) *">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password *">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="text" name="surname" class="form-control" placeholder="Second Name *">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email *">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Password Confirmation *">
                </div>
            </div>
            <div class="col-12 registration-form__submit-button">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </div>
    </form>

@endsection
