<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Api\ApiController;
use App\Services\Event\GetAllEventsByUserIdService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;



class GetAllEventsByUserIdController extends ApiController
{
    private GetAllEventsByUserIdService $getAllEventsByUserIdService;

    public function __construct(GetAllEventsByUserIdService $getAllEventsByUserIdService)
    {
        $this->getAllEventsByUserIdService = $getAllEventsByUserIdService;
    }

    public function handle(int $user_id):JsonResponse
    {
        try
        {
            $events =  $this->getAllEventsByUserIdService->handle($user_id);
            return $this->successResponse($events, 'Events found successfully',Response::HTTP_OK);
        }
        catch(\Exception $exception)
        {
            return $this->errorResponse($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }

}
