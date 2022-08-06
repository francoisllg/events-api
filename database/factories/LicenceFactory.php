<?php

namespace Database\Factories;

use App\Models\Licence;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Licence>
 */
class LicenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' => Licence::STATUS_AVAILABLE,
            'user_id' => 2,
            //'user_id' => User::all()->random()->id
        ];
    }
}
