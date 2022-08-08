<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Api\ApiController as ApiApiController;
use App\Http\Controllers\Controller;
use App\Services\Event\DeleteEventService;
use App\Http\Controllers\ApiController;


class DeleteEventController extends ApiApiController
{
    private DeleteEventService $deleteEventService;

    public function __construct(DeleteEventService $deleteEventService)
    {
        $this->deleteEventService = $deleteEventService;
    }

    public function handle($event_id)
    {
        $event =  $this->deleteEventService->handle($event_id);
        return $this->successResponse($event, 'Event deleted successfully',201);
    }

}
