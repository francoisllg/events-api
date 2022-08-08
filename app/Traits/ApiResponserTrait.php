<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponserTrait{

    protected function successResponse($data, $message = null, $code = 200):JsonResponse
	{
		return new JsonResponse([
			'status'=> 'Success',
			'message' => $message,
			'data' => $data
		], $code);
	}

	protected function errorResponse($message = null, $code):JsonResponse
	{
		return new JsonResponse([
			'status'=>'Error',
			'message' => $message,
			'data' => null
		], $code);
	}

}
