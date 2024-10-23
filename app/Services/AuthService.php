<?php

namespace App\Services;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthService
{

    public function register($data)
    {
        $user = User::create(
            [
                "email" => $data["email"],
                "telephone" => $data["telephone"],
                "password" => $data["password"],
                "type" => 'worker'
            ]
        );
        Worker::create(
            [
                "user_id" => $user->id
            ]
        );
    }

    public function login(array $data)
    {

        $user = User::where(['telephone' => $data['telephone']])->first();

        if (!$user) {
            return false;
        }

        if (Hash::check($data['password'], $user->password)) {
            Auth::login($user);
            return true;
        }
        return false;
    }

    public function logout()
    {
        Auth::logout();
    }
}
