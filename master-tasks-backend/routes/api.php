<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
// use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // Authentication future (commented out for now)
    Route::post('/logout', [AuthController::class, 'logout']);

    // User future routes (commented out for now)
    // Route::get('/profile', [UserController::class, 'profile']);
    // Route::put('/profile', [UserController::class, 'updateProfile']);
    // Route::put('/change-password', [UserController::class, 'changePassword']);

    // Tasks
    Route::get('/tasks/search', [TasksController::class, 'search']);
    Route::apiResource('tasks', TasksController::class);
    Route::post('/logout',[AuthController::class,'logout']);
});