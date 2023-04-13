<?php

use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\UserResourceController;
use App\Http\Controllers\Api\MessagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/carousel', [CarouselItemsController::class, 'index']);

Route::get('/carousel/{id}', [CarouselItemsController::class, 'show']);

Route::post('/carousel', [CarouselItemsController::class, 'store']);

Route::put('/carousel/{id}', [CarouselItemsController::class, 'update']);

Route::delete('/carousel/{id}', [CarouselItemsController::class, 'destroy']);


Route::get('/user', [UserResourceController::class, 'index']);

Route::get('/user/{id}', [UserResourceController::class, 'show']);

Route::delete('/user/{id}', [UserResourceController::class, 'destroy']);


Route::post('/messages', [MessagesController::class, 'store']);

Route::delete('/messages/{id}', [MessagesController::class, 'destroy']);