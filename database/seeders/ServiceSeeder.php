<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workers = Worker::all();

        foreach ($workers as $worker) {
            Service::factory(10)->create([
                'worker_id' => $worker->id,
            ]);
        }
    }
}
