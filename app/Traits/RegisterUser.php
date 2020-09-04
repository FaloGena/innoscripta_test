<?php


namespace App\Traits;


use App\Models\User;

trait RegisterUser
{

    public function registerUser($attributes)
    {
        $user = User::create([
            'phone' => $attributes->phone,
            'password' => $attributes->password,
            'name' => $attributes->name,
            'surname' => $attributes->surname,
        ]);

        return $user;
    }
}
