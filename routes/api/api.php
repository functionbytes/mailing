<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ErpController;
use App\Http\Controllers\Api\SubscribersController;
use App\Http\Controllers\Api\TicketsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'subscribers'], function () {
    Route::post('/', [SubscribersController::class, 'process']);
    Route::put('/replace', [SubscribersController::class, 'replace']);
    Route::patch('patch', [SubscribersController::class, 'update']);
    Route::post('process', [SubscribersController::class, 'process']);
    Route::post('campaigns', [SubscribersController::class, 'campaigns']);
});


Route::group(['prefix' => 'subscribers'], function () {
    Route::post('/', [SubscribersController::class, 'process']);
    Route::put('/replace', [SubscribersController::class, 'replace']);
    Route::patch('patch', [SubscribersController::class, 'update']);
    Route::post('process', [SubscribersController::class, 'process']);
    Route::post('campaigns', [SubscribersController::class, 'campaigns']);
    Route::get('synchronization', [SubscribersController::class, 'synchronization']);
});

Route::middleware('auth:sanctum')->group(function() {

    Route::apiResource('tickets', TicketsController::class)->except(['update']);
    Route::put('tickets/{ticket}', [TicketsController::class, 'replace']);
    Route::patch('tickets/{ticket}', [TicketsController::class, 'update']);

});


Route::prefix('campaigns')->group(function () {
    Route::post('/', [CampaignController::class, 'create']);
    Route::get('{id}', [CampaignController::class, 'get']);
    Route::delete('{id}', [CampaignController::class, 'delete']);
    Route::patch('{id}', [CampaignController::class, 'update']);
    Route::post('{id}/send_all', [CampaignController::class, 'sendAll']);
    Route::post('{id}/send_test', [CampaignController::class, 'sendTest']);
});
