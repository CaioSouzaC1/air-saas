<?php
namespace App\Services;

use App\Models\Scheduling;

class ScheduleService
{
    public function store(array $data)
    {
        $scheduling = Scheduling::create([
            'client_id' => $data['clientId'],
            'machine_id' => $data['machineId'],
            'service_id' => $data['serviceId'],
            'user_id' => $data['operatorId'],
            'date' => $data['date'],
        ]);
        if ($scheduling) {
            return true;
        }
        return false;
    }
}