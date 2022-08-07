<?php

namespace App\Services\Event;
use App\Interfaces\EventRepositoryInterface;

class CreateEventService
{


    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }


    public function handle(array $data)
    {
        return $this->eventRepository->create($data);
    }

}
