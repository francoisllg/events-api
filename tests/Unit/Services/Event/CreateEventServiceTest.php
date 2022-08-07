<?php

namespace Tests\Unit\Services\Event;


use App\Models\User;
use App\Models\Licence;
use App\Models\Event;
use App\Services\Event\CreateEventService;
use Tests\Unit\Services\Event\EventModuleUnitTestCase;

class CreateEventServiceTest extends EventModuleUnitTestCase
{

    private CreateEventService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new CreateEventService($this->eventRepository());
    }


    /**
     * @test
     */
    public function service_can_create_an_event()
    {

         // arrange
        $new_event_data = [
            'name' => fake()->word(),
            'user_id' => User::all()->random()->id,
            'licence_id' => Licence::all()->random()->id,
            'url' => fake()->url(),
            'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        ];

        $created_event = new Event ([
            'id' => 1,
            'name' => $new_event_data['name'],
            'user_id' => $new_event_data['user_id'],
            'licence_id' => $new_event_data['licence_id'],
            'url' => $new_event_data['url'],
            'end_date' => $new_event_data['end_date'],
         ]);

        $this->shouldCallRepositoryCreate($new_event_data , $created_event);

        // act
        $result = $this->service->handle($new_event_data);

        // assert
        $this->assertEquals($created_event->toArray() , $result);

    }
}
