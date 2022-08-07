<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Licence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'url' => fake()->url(),
            'end_date' => fake()->date(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
