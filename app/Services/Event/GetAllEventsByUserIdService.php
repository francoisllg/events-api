<?php

namespace App\Services\Event;
use App\Interfaces\EventRepositoryInterface;

class GetAllEventsByUserIdService
{

    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }


    public function handle($user_id)
    {
        return $this->eventRepository->getAllEventsByUserId($user_id);
    }

}
