<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OwnersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 100000),
            'max_users' => $this->faker->numberBetween(1, 100000),
            'expired_at' => $this->faker->date(),
        ];
    }
}