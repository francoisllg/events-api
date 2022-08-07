<?php

namespace App\Http\Controllers\Api\Event;
use App\Http\Controllers\Controller;
use App\Services\Event\UpdateEventService;
use Illuminate\Http\Request;


class UpdateEventController extends Controller
{
    private UpdateEventService $updateEventService;

    public function __construct(UpdateEventService $updateEventService)
    {
        $this->updateEventService = $updateEventService;
    }

    public function handle($event_id,Request $request)
    {
        $event =  $this->updateEventService->handle($event_id,$request->all());
        return response()->json($event, 201);

    }

}
