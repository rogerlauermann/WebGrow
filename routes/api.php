<?php

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

Route::post('/store-grow-data', 'App\Http\Controllers\GrowDataController@store');

Route::post('/store-soil-data', 'App\Http\Controllers\SoilDataController@store');

Route::post('/store-watering-data', 'App\Http\Controllers\WateringDataController@store');
