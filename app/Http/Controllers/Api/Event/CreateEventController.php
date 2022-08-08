<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\CreateEventRequest;
use App\Services\Event\CreateEventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CreateEventController extends ApiController
{
    private CreateEventService $createEventService;

    public function __construct(CreateEventService $createEventService)
    {
        $this->createEventService = $createEventService;
    }

    public function handle(CreateEventRequest $request):JsonResponse
    {
        try
        {
        $newEventData = $request->validated();
        $newEventData['user_id'] = auth()->user()->id;
        $event =  $this->createEventService->handle($newEventData);
        return $this->successResponse($event, 'Event created successfully',Response::HTTP_CREATED);
        }
        catch (\Exception $exception)
        {
            return $this->errorResponse($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }


}
