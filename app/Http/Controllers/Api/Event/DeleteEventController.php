<?php

namespace App\Http\Controllers\Api\Event;
use App\Http\Controllers\Controller;
use App\Services\Event\DeleteEventService;


class DeleteEventController extends Controller
{
    private DeleteEventService $deleteEventService;

    public function __construct(DeleteEventService $deleteEventService)
    {
        $this->deleteEventService = $deleteEventService;
    }

    public function handle($event_id)
    {
        $event =  $this->deleteEventService->handle($event_id);
        return response()->json($event, 201);
    }

}
