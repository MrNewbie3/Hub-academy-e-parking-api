<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\EventController;
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
Route::group(['prefix' => 'camera'], function () {
    Route::get("/", [CameraController::class, "index"])->name('camera.get');
    Route::put('/{id}', [CameraController::class, 'update']);
    Route::get("/hello", function () {
        return "Hello world";
    });
});
Route::group(['prefix' => 'event'], function () {
    Route::get("/", [EventController::class, "index"])->name('event.get');
    Route::post("/", [EventController::class, "store"])->name('event.store');
    Route::get("/{id}", [EventController::class, "show"])->name('event.getById');
    Route::put("/{id}", [EventController::class, "update"])->name('event.update');
    Route::delete("/{id}", [EventController::class, "destroy"])->name('event.delete');
});
Route::group(['prefix' => 'attendance'], function () {
    Route::get("/", [AttendanceController::class, "index"])->name('attendance.get');
    Route::post("/", [AttendanceController::class, "store"])->name('attendance.store');
    Route::get("/{id}", [AttendanceController::class, "show"])->name('attendance.getById');
    Route::put("/{id}", [AttendanceController::class, "update"])->name('attendance.update');
    Route::delete("/{id}", [AttendanceController::class, "destroy"])->name('attendance.delete');
    Route::get("/getByEventId/{id}", [AttendanceController::class, "getByEventId"])->name('attendance.byEventId');
});
