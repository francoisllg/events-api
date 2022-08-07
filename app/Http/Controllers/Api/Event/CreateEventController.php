<?php

namespace App\Http\Controllers\Api\Event;
use App\Http\Controllers\Controller;
use App\Services\Event\CreateEventService;
use Illuminate\Http\Request;


class CreateEventController extends Controller
{
    private CreateEventService $createEventService;

    public function __construct(CreateEventService $createEventService)
    {
        $this->createEventService = $createEventService;
    }

    public function handle(Request $request)
    {
        $event =  $this->createEventService->handle($request->all());
        return response()->json($event, 201);

    }

}
