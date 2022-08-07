<?php

namespace Tests\Unit\Services\Event;

use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;
use Tests\TestCase;

class EventModuleUnitTestCase extends TestCase
{
    protected $eventRepository;

    public function eventRepository()
    {
        return $this->eventRepository = $this->eventRepository ?: $this->mock(EventRepositoryInterface::class);

    }

    protected function shouldCallRepositoryCreate (array $new_event_data,Event $created_event)
    {
        $this->eventRepository
            ->shouldReceive('create')
            ->once()
            ->withArgs(
                function ($expected_event) use ($new_event_data) {
                    $this->assertEquals($expected_event['name'], $new_event_data['name']);
                    $this->assertEquals($expected_event['user_id'], $new_event_data['user_id']);
                    $this->assertEquals($expected_event['end_date'], $new_event_data['end_date']);
                    $this->assertEquals($expected_event['licence_id'], $new_event_data['licence_id']);
                    $this->assertEquals($expected_event['url'], $new_event_data['url']);

                    return true;
                })
            ->andReturn($created_event->toArray());
    }

    protected function shouldCallRepositoryUpdate (int $event_id,array $updated_event_data,Event $updated_event)
    {
        $this->eventRepository
            ->shouldReceive('update')
            ->once()
            ->withArgs(
                function ($expected_event_id,$expected_event) use ($event_id,$updated_event_data) {
                    $this->assertEquals($expected_event_id, $event_id);
                    $this->assertEquals($expected_event['name'], $updated_event_data['name']);
                    $this->assertEquals($expected_event['user_id'], $updated_event_data['user_id']);
                    $this->assertEquals($expected_event['end_date'], $updated_event_data['end_date']);
                    $this->assertEquals($expected_event['licence_id'], $updated_event_data['licence_id']);
                    $this->assertEquals($expected_event['url'], $updated_event_data['url']);
                    return true;
                })
            ->andReturn($updated_event->toArray());

    }

    protected function shouldCallRepositoryGetAllEventsByUserId (int $user_id,array $events,$expected_count_events)
    {
        $this->eventRepository
            ->shouldReceive('getAllEventsByUserId')
            ->once()
            ->withArgs(
                function ($expected_user_id) use ($user_id,$events,$expected_count_events) {
                    $this->assertEquals($expected_user_id, $user_id);
                    $this->assertCount($expected_count_events,$events);
                    return true;
                })
            ->andReturn($events);
    }

    protected function shouldCallRepositoryDelete (int $event_id,Event $deleted_event)
    {
        $this->eventRepository
            ->shouldReceive('delete')
            ->once()
            ->withArgs(
                function ($expected_event_id) use ($event_id) {
                    $this->assertEquals($expected_event_id, $event_id);
                    return true;
                })
            ->andReturn($deleted_event->toArray());
    }

}
