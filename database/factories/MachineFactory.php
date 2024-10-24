<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => Client::factory()->create()->user->id,
            'name' => $this->faker->randomElement(['Air conditioning', 'Refrigerator', 'Stove', 'Microwave']),
            'model' => $this->faker->randomElement(['Samsung', 'LG', 'Electrolux', 'Brastemp']),
        ];
    }
}
