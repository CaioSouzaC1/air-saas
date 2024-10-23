<?php

namespace App\Services;

use App\Models\Operator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OperatorService
{
    public function register($data)
    {
        $user = User::query()->create(
            [
                "name" => $data["name"],
                "telephone" => $data["telephone"],
                "password" => "corinthians",
                "type" => 'operator'
            ]
        );
        $operator = Operator::query()->create(
            [
                "user_id" => $user->id,
                "worker_id" => Auth::user()->worker_id
            ]
        );
        if ($user && $operator) {
            return true;
        }
    }
}