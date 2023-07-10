<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\EventController;

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
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [UserController::class, 'me']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::middleware('is.admin')->group(function () {
        Route::get('/admin', function () {
            return 'admin';
        });
    });
});
Route::get('event',[EventController::class, 'event']);
Route::get('/event/{id}', [EventController::class, 'getById']);
Route::post('event', [EventController::class, 'create']);
Route::put('/event/{id}', [EventController::class, 'update']);
Route::delete('/event/{id}', [EventController::class, 'delete']);
Route::get('/filter', [EventController::class, 'filter']);
