<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Api\ApiController;
use App\Services\Event\CreateEventService;
use Illuminate\Http\Request;

class CreateEventController extends ApiController
{
    private CreateEventService $createEventService;

    public function __construct(CreateEventService $createEventService)
    {
        $this->createEventService = $createEventService;
    }

    public function handle(Request $request)
    {
        $event =  $this->createEventService->handle($request->all());
        return $this->successResponse($event, 'Event created successfully',201);

    }

}
