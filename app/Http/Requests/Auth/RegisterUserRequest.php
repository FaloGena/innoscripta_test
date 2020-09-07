<?php

namespace App\Http\Requests\Auth;


class RegisterUserRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return parent::authorize();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return parent::rules() + [
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'phone' => 'required|numeric|unique:users',
            'password_confirmation' => 'required|same:password',
            'email' => 'nullable|email'
        ];
    }
}
