<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Api\ApiController as ApiApiController;
use App\Services\Event\DeleteEventService;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DeleteEventController extends ApiApiController
{
    private DeleteEventService $deleteEventService;

    public function __construct(DeleteEventService $deleteEventService)
    {
        $this->deleteEventService = $deleteEventService;
    }

    public function handle(int $event_id):JsonResponse
    {
        try
        {
            $eventDeletedId =  $this->deleteEventService->handle($event_id);
            return $this->successResponse('Event ID :'.$eventDeletedId,
            'Event deleted successfully',Response::HTTP_OK);
        }
        catch(\Exception $exception)
        {
            return $this->errorResponse($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

}
