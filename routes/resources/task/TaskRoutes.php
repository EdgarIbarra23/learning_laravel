<?php

use App\Http\Controllers\api\task\DeleteTaskController;
use App\Http\Controllers\api\task\GetAllTasksController;
use App\Http\Controllers\api\task\GetTaskByIdController;
use App\Http\Controllers\api\task\GetTaskByUserController;
use App\Http\Controllers\api\task\PostTaskController;
use App\Http\Controllers\api\task\UpdateTaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', GetAllTasksController::class);
Route::get('{id}', GetTaskByIdController::class);
Route::get('/user/{id}', GetTaskByUserController::class);
Route::post('post-task', PostTaskController::class);
Route::put('update-task/{id}',  UpdateTaskController::class);
Route::delete('delete-task/{id}', DeleteTaskController::class);
