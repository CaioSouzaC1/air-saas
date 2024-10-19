<?php

namespace App\Services;

use App\Models\Service;

class ServiceService
{

    public function register(array $data)
    {
        return Service::create($data);
    }
}
