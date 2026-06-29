<?php

namespace Database\Factories;

use App\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => fake()->company(),
            'ip_address' => fake()->ipv4(),
            'api_token' => fake()->randomAscii(),
            'is_active' => fake()->boolean(80),
        ];
    }
}
