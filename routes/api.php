<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatsController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// RUTAS PÚBLICAS
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// RUTAS PROTEGIDAS
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/users',         [UserController::class, 'index']);
    Route::post('/users',        [UserController::class, 'store']);
    Route::get('/users/{id}',    [UserController::class, 'show']);
    Route::put('/users/{id}',    [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    Route::get('/stats/users/daily',   [StatsController::class, 'usersDaily']);
    Route::get('/stats/users/weekly',  [StatsController::class, 'usersWeekly']);
    Route::get('/stats/users/monthly', [StatsController::class, 'usersMonthly']);
});
