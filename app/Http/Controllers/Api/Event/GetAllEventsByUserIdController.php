<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Api\ApiController;
use App\Services\Event\GetAllEventsByUserIdService;
use Illuminate\Http\Request;



class GetAllEventsByUserIdController extends ApiController
{
    private GetAllEventsByUserIdService $getAllEventsByUserIdService;

    public function __construct(GetAllEventsByUserIdService $getAllEventsByUserIdService)
    {
        $this->getAllEventsByUserIdService = $getAllEventsByUserIdService;
    }

    public function handle($user_id)
    {
        $events =  $this->getAllEventsByUserIdService->handle($user_id);
        return $this->successResponse($events, 'Events retrieved successfully',201);

    }

}
