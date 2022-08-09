<?php

namespace App\Services\Event;
use App\Interfaces\EventRepositoryInterface;
use App\Services\Licence\GetAllLicencesByUserIdService;
use App\Services\Licence\SetLicenceToUnavaliableService;

class CreateEventService
{


    private $eventRepository;
    private $getAllLicencesByUserIdService;

    public function __construct(
        EventRepositoryInterface $eventRepository,
        GetAllLicencesByUserIdService $getAllLicencesByUserIdService,
        SetLicenceToUnavaliableService $setLicenceToUnavaliableService
        )
        {
        $this->eventRepository = $eventRepository;
        $this->getAllLicencesByUserIdService = $getAllLicencesByUserIdService;
        $this->setLicenceToUnavaliableService = $setLicenceToUnavaliableService;
        }

    public function handle(array $new_event_data):array
    {
        $availableLicenses = $this->getAllLicencesByUserIdService->handle($new_event_data['user_id']);

        if(!empty($availableLicenses)){
            $new_event_data['licence_id'] = $availableLicenses[0]['id'];
            $event = $this->eventRepository->create($new_event_data);
            $this->setLicenceToUnavaliableService->handle($availableLicenses[0]['id']);
            return $event;
        }
        else{
            throw new \Exception('No available licenses');
        }
    }

}
