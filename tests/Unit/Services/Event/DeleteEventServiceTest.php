<?php

namespace Tests\Unit\Services\Event;


use App\Models\User;
use App\Models\Licence;
use App\Models\Event;
use App\Services\Event\DeleteEventService;
use Tests\Unit\Services\Event\EventModuleUnitTestCase;

class DeleteEventServiceTest extends EventModuleUnitTestCase
{

    private DeleteEventService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new DeleteEventService($this->eventRepository());
    }

    /**
     * @test
     */
    public function service_can_delete_an_event()
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

        $event_id_to_delete = $events[0]->first()->id;
        $this->shouldCallRepositoryDelete($event_id_to_delete,$events[0]->first());

        //act
        $result = $this->service->handle($event_id_to_delete);

        //assert
        $this->assertEquals($events[0]->first()->toArray(), $result);

    }
}
