<?php

namespace App\Services;

use App\Models\Machine;

class MachineService
{

    public function register(array $data)
    {
        return Machine::create($data);
    }
}
