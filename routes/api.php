<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ManagerController;
use App\Http\Controllers\Api\OperatorController;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\ParkingController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\PlacesTypeController;
use App\Http\Controllers\Api\VehicleTypeController;

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
//API User
Route::get('/users', [UserController::class, 'allUsers']);
Route::post('/users', [UserController::class, 'addUser']);
Route::post('/users/edit', [UserController::class, 'updateUser']);
Route::post('/users/delete', [UserController::class, 'deleteUser']);

//API Manager
Route::get('/managers', [ManagerController::class, 'allManagers']);
Route::post('/managers', [ManagerController::class, 'addManager']);
Route::post('/managers/edit', [ManagerController::class, 'updateManager']);
Route::post('/managers/delete', [ManagerController::class, 'deleteManager']);

//API Operator
Route::get('/operators', [OperatorController::class, 'allOperators']);
Route::post('/operators', [OperatorController::class, 'addOperator']);
Route::post('/operators/edit', [OperatorController::class, 'updateOperator']);
Route::post('/operators/delete', [OperatorController::class, 'deleteOperator']);

//API Types of Vehicle
Route::get('/vehicleType', [VehicleTypeController::class, 'allVehicleTypes']);
Route::post('/vehicleType', [VehicleTypeController::class, 'addVehicleType']);
Route::post('/vehicleType/edit', [VehicleTypeController::class, 'updateVehicleType']);
Route::post('/vehicleType/delete', [VehicleTypeController::class, 'deleteVehicleType']);

//API Places
Route::get('/placeType', [PlacesTypeController::class, 'allPlacesTypes']);
Route::post('/placeType', [PlacesTypeController::class, 'addPlacesType']);
Route::post('/placeType/edit', [PlacesTypeController::class, 'updatePlacesType']);
Route::post('/placeType/delete', [PlacesTypeController::class, 'deletePlacesType']);

//API Area
Route::get('/areas', [AreaController::class, 'allAreas']);
Route::post('/areas', [AreaController::class, 'addArea']);
Route::post('/areas/edit', [AreaController::class, 'updateArea']);
Route::post('/areas/delete', [AreaController::class, 'deleteArea']);

//API Parkings
Route::get('/parkings', [ParkingController::class, 'allParkings']);
Route::post('/parkings', [ParkingController::class, 'addParking']);
Route::post('/parkings/edit', [ParkingController::class, 'updateParking']);
Route::post('/parkings/delete', [ParkingController::class, 'deleteParking']);

//API Bookings
Route::get('/bookings', [BookingController::class, 'allBookings']);
Route::post('/bookings', [BookingController::class, 'addBooking']);
Route::post('/bookings/edit', [BookingController::class, 'updateBooking']);
Route::post('/bookings/delete', [BookingController::class, 'deleteBooking']);