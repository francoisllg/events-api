<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Event\CreateEventController;
use App\Http\Controllers\Api\Event\UpdateEventController;
use App\Http\Controllers\Api\Event\GetAllEventsByUserIdController;
use App\Http\Controllers\Api\Event\DeleteEventController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'events'], function () {
    Route::post('/', [CreateEventController::class, 'handle']);
    Route::patch('/{event}', [UpdateEventController::class, 'handle']);
    Route::delete('/{event}', [DeleteEventController::class, 'handle']);
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/{user}/events', [GetAllEventsByUserIdController::class, 'handle']);
});
