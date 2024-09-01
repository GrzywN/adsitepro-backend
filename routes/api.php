<?php

use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
});

Route::controller(TaskController::class)->group(function () {
    Route::get('/tasks', 'index');
    Route::post('/tasks', 'store');
    Route::get('/tasks/{task}', 'show');
    Route::put('/tasks/{task}', 'update');
    Route::delete('/tasks/{task}', 'destroy');
});

Route::controller(TaskCategoryController::class)->group(function () {
    Route::get('/task-categories', 'index');
    Route::post('/task-categories', 'store');
    Route::get('/task-categories/{taskCategory}', 'show');
    Route::put('/task-categories/{taskCategory}', 'update');
    Route::delete('/task-categories/{taskCategory}', 'destroy');
});
