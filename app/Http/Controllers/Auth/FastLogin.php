<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FastLogin extends Controller
{
    public function login($userId, $machineId)
    {

        $user = User::find($userId);

        if (!$user) {
            return to_route('login');
        }

        Auth::login($user);

        return to_route('my-machines', ['machineId' => $machineId]);
    }
}
