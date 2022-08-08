<?php

namespace App\Services\Event;
use App\Interfaces\EventRepositoryInterface;

class DeleteEventService
{


    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }


    public function handle(int $event_id):int
    {
        return $this->eventRepository->delete($event_id);
    }

}
