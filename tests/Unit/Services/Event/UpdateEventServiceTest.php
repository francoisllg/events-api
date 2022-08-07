<?php

namespace Tests\Unit\Services\Event;

use App\Models\Licence;
use App\Models\User;
use App\Models\Event;
use App\Services\Event\UpdateEventService;
use Faker\Factory;

class UpdateEventServiceTest extends EventModuleUnitTestCase
{
    private UpdateEventService $service;

protected function setUp(): void
{
    parent::setUp();
    $this->service = new UpdateEventService($this->eventRepository());
}

   /**
     * @test
     */

    public function service_can_update_an_event(){

       $event_id = 2;

       $old_event = new Event([
        "name" => "Gia Carroll I",
        "url" => "http://kirlin.com/molestiae-recusandae-aut-vitae-temporibus",
        "end_date" => "1992-12-15",
        "user_id" => 2,
        "licence_id" => "05da26b6-867d-478a-ad1b-86e721d4a1fd",
        "id" => 2
       ]);

       $update_event_data = [
           'name' => 'Updated Event',
           'user_id' => User::all()->random()->id,
           'end_date' => '2023-01-01',
           'licence_id' => Licence::all()->random()->id,
           'url' => 'https://www.updated.com'
       ];

       $updated_event = new Event([
           'name' => $update_event_data['name'],
           'user_id' => $update_event_data['user_id'],
           'end_date' => $update_event_data['end_date'],
           'licence_id' => $update_event_data['licence_id'],
           'url' => $update_event_data['url'],
           'id' => $old_event->id
       ]);

       $this->shouldCallRepositoryUpdate($event_id,$update_event_data , $updated_event);

          // act
          $result = $this->service->handle($event_id,$update_event_data);

          // assert
          $this->assertEquals($updated_event->toArray() , $result);
    }


}
