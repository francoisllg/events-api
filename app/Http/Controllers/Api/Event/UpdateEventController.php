<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Api\ApiController;
use App\Services\Event\UpdateEventService;
use Illuminate\Http\Request;





class UpdateEventController extends ApiController
{
    private UpdateEventService $updateEventService;

    public function __construct(UpdateEventService $updateEventService)
    {
        $this->updateEventService = $updateEventService;
    }

    public function handle($event_id,Request $request)
    {
        $event =  $this->updateEventService->handle($event_id,$request->all());
        return $this->successResponse($event, 'Event updated successfully',201);
    }

}
