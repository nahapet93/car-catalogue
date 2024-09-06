<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarModelController;
use App\Models\Color;
use App\Models\EngineType;
use App\Models\TransmissionType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/brands', [BrandController::class, 'index']);
Route::get('/models', [CarModelController::class, 'index']);
Route::get('/colors', fn () => Color::all());
Route::get('/engine-types', fn () => EngineType::all());
Route::get('/transmission-types', fn () => TransmissionType::all());

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/brands', [BrandController::class, 'store']);
    Route::put('/brands/{id}', [BrandController::class, 'update']);

    Route::post('/models', [CarModelController::class, 'store']);
    Route::put('/models/{id}', [CarModelController::class, 'update']);
});


