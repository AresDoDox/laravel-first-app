<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;

Route::get('/test', function () {
    return response()->json(['message' => 'API is working'], 200);
});

// Route::post('/todos', [TodoController::class, 'store']);
// Route::get('/todos', [TodoController::class, 'index']);
// Route::get('/todos/{id}', [TodoController::class, 'show']);
// Route::put('/todos/{id}', [TodoController::class, 'update']);
// Route::delete('/todos/{id}', [TodoController::class, 'destroy']);

// Route::apiResource('todos', TodoController::class)->only(['index', 'show', 'store', 'update', 'destroy']);

Route::post('/login', [AuthController::class, 'login']);

// check apis bằng laravel sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('todos', TodoController::class)->only(['index', 'show', 'store', 'update', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
