<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Licence;
use App\Services\Event\CreateEventService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    public function setup(): void
    {
        parent::setup();
        $this->service = $this->app->make(CreateEventService::class);
    }

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
            'user_id' => 2,
        ];
    }
}
