<?php

use Illuminate\Http\Request;

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


Route::middleware('auth:api')->group(function () {
    Route::get('users/current', 'UserController@current');
    Route::put('users/current', 'UserController@updateCurrent');
    Route::get('vehicles/my', 'VehicleController@currentUserVehicles');
    Route::apiResources([
        'trips' => 'TripController',
        'vehicles' => 'VehicleController',
        'driver-settings' => 'DriverSettingsController',
    ]);
    Route::middleware('allowed_roles:admin')->group(function() {
        Route::apiResources([
            'users' => 'UserController',
        ]);
    });
});
Route::post('users/register', 'UserController@store');
