<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthService
{

    public function register($data)
    {
        return User::create(
            [
                "email" => $data["email"],
                "telephone" => $data["telephone"],
                "password"  => Hash::make($data["password"])
            ]
        );
    }

    public function login(array $data)
    {
        if (Auth::attempt($data)) {
            return redirect("/dashboard");
        }
        return false;
    }
}
