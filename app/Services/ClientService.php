<?php

namespace App\Services;

use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ClientService
{
    public function registerClient(array $data)
    {

        $worker = Auth::user();

        if (!$worker)
            return false;

        $user = User::query()->create([
            "name" => $data["name"],
            "telephone" => $data["telephone"],
            "password" => 'corinthians',
            "type" => "client"
        ]);

        Client::query()->create([
            "user_id" => $user->id,
            "worker_id" => $worker->id
        ]);

        return true;
    }
}
