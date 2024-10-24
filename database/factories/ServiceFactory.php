<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'worker_id' => Worker::get()->random()->id,
            'name' => 'Fix ' . $this->faker->randomElement(['Air conditioning', 'Refrigerator', 'Stove', 'Microwave']),
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 200),
        ];
    }
}
