<?php

namespace App\Services\Event;
use App\Interfaces\EventRepositoryInterface;

class UpdateEventService
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }


    public function handle(int $event_id,array $updated_event_data)
    {
        return $this->eventRepository->update($event_id,$updated_event_data);
    }
}
