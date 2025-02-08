<?php

use App\Http\Controllers\api\user\DeleteUserController;
use App\Http\Controllers\api\user\GetAllUsersController;
use App\Http\Controllers\api\user\GetUserByEmailController;
use App\Http\Controllers\api\user\GetUserByIdController;
use App\Http\Controllers\api\user\PostUserController;
use App\Http\Controllers\api\user\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', GetAllUsersController::class);
Route::get('{id}', GetUserByIdController::class);
Route::get('email/{email}', GetUserByEmailController::class);
Route::post('post-user', PostUserController::class);
Route::put('update-user/{id}', UpdateUserController::class);
Route::delete('delete-user/{id}', DeleteUserController::class);
