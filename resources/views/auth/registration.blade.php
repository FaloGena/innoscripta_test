@extends('layouts.main')
@section('content')
            <form action="javascript:void(null);" method="POST" class="col-12 registration-form">
                {{csrf_field()}}
                <div class="row">
            <div class="col-6 registration-form__name-input">
                <label for="registration-form__name-input">Name</label>
                <input type="text" name="name" id="registration-form__name-input">
            </div>
            <div class="col-6 registration-form__surname-input">
                <label for="registration-form__surname-input">Surname</label>
                <input type="text" name="surname" id="registration-form__surname-input">
            </div>
            <div class="col-6 registration-form__phone-input">
                <label for="registration-form__phone-input">Phone</label>
                <input type="tel" name="phone" id="registration-form__phone-input">
            </div>
            <div class="col-6 registration-form__email-input">
                <label for="registration-form__email-input">Email</label>
                <input type="email" name="email" id="registration-form__email-input">
            </div>
            <div class="col-6 registration-form__password-input">
                <label for="registration-form__password-input">Password</label>
                <input type="password" name="password" id="registration-form__password-input">
            </div>
            <div class="col-6 registration-form__password_confirmation-input">
                <label for="registration-form__password_confirmation-input">Password confirmation</label>
                <input type="password" name="password_confirmation" id="registration-form__password_confirmation-input">
            </div>
                <button type="submit">Submit</button>
                </div>
            </form>

@endsection
