<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WorkerController;
use App\Http\Controllers\Api\CostumerController;

Route::controller(WorkerController::class)->group(function () {
    Route::post('/workers', 'store');
    Route::put('/workers/{id}', 'update');
    Route::delete('/workers/{id}', 'destroy');
    Route::get('/workers', 'index');
    Route::get('/workers/{id}', 'show');
});

Route::controller(CostumerController::class)->group(function (){
    Route::post('/costumers', 'store');
    Route::put('/costumers/{id}', 'update');
    Route::delete('/costumers/{id}', 'destroy');
    Route::get('/costumers', 'index');
    Route::get('/costumers/{id}', 'show');
});

Route::controller(TaskController::class)->group(function (){
    Route::post('/tasks', 'store');
    Route::put('/tasks/{id}', 'update');
    Route::delete('/tasks/{id}', 'destroy');
    Route::get('/tasks', 'index');
    Route::get('/tasks/{id}', 'show');
});