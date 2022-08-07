<?php

namespace Tests\Unit\Services\Event;


use App\Models\User;
use App\Models\Licence;
use App\Models\Event;
use App\Services\Event\GetAllEventsByUserIdService;
use Tests\Unit\Services\Event\EventModuleUnitTestCase;

class GetAllEventsByUserIdServiceTest extends EventModuleUnitTestCase
{
    private GetAllEventsByUserIdService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new GetAllEventsByUserIdService($this->eventRepository());
    }

    /** @test */
    public function service_can_get_all_events_by_user_id()
    {
        //arrange
        $user = User::all()->random();
        $events = [
            new Event([
                'id' => 1,
                'name' => fake()->word(),
                'user_id' => $user->id,
                'licence_id' => Licence::all()->random()->id,
                'url' => fake()->url(),
                'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            ]),
            new Event([
                'id' => 2,
                'name' => fake()->word(),
                'user_id' => $user->id,
                'licence_id' => Licence::all()->random()->id,
                'url' => fake()->url(),
                'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            ]),
            new Event([
                'id' => 3,
                'name' => fake()->word(),
                'user_id' => $user->id,
                'licence_id' => Licence::all()->random()->id,
                'url' => fake()->url(),
                'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            ]),
        ];

        $expected_count_events = 3;

        $this->shouldCallRepositoryGetAllEventsByUserId($user->id, $events,$expected_count_events);

        // act
        $result = $this->service->handle($user->id);

        // assert
        $this->assertEquals($events, $result);



    }
}
