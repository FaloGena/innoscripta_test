<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    use RegisterUser;

    public function show()
    {
        return view('auth.registration');
    }

    public function register(RegisterUserRequest $request)
    {
        $attributes = $request->except(['_token', 'password_confirmation']);
        $user = User::create($attributes);
        Auth::login($user);
        return response()->redirectTo('/');
    }
}
