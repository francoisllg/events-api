<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\UpdateEventRequest;
use App\Services\Event\UpdateEventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;



class UpdateEventController extends ApiController
{
    private UpdateEventService $updateEventService;

    public function __construct(UpdateEventService $updateEventService)
    {
        $this->updateEventService = $updateEventService;
    }

    public function handle(int $event_id,UpdateEventRequest $request):JsonResponse
    {
        try
        {

            $validated_info = $request->validated();
            $event =  $this->updateEventService->handle($event_id,$validated_info);
            return $this->successResponse($event, 'Event updated successfully',Response::HTTP_OK);
        }
        catch (\Exception $exception)
        {
            return $this->errorResponse($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }



    }

}
