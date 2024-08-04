<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BreedController;
use App\Http\Controllers\Api\ParkController;
use App\Http\Controllers\Api\UserController; // Correct namespace

Route::get('/breed', [BreedController::class, 'getAllBreeds']);
Route::get('/breed/{breed}', [BreedController::class, 'getBreed']);

// The below route points to a function which uses a URL that doesn't exist.
Route::get('/breed/random', [BreedController::class, 'getRandomBreed']);

Route::get('/breed/{breed}/image', [BreedController::class, 'getBreedImage']);

Route::post('/user/{userId}/associate-park', [UserController::class, 'associatePark']);
Route::post('/user/{userId}/associate-breed', [UserController::class, 'associateBreed']);
Route::post('/park/{parkId}/associate-breed', [ParkController::class, 'associateBreed']);
