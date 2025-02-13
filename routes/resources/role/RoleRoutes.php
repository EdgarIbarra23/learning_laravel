<?php

use App\Http\Controllers\api\role\DeleteRoleController;
use App\Http\Controllers\api\role\GetAllRolesController;
use App\Http\Controllers\api\role\GetRoleByIdController;
use App\Http\Controllers\api\role\PostRoleController;
use App\Http\Controllers\api\role\UpdateRoleController;
use Illuminate\Support\Facades\Route;

Route::post('post-role', PostRoleController::class);

Route::middleware('auth:api')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/', GetAllRolesController::class);
        Route::get('{id}', GetRoleByIdController::class);
        Route::put('update-role/{id}', UpdateRoleController::class);
        Route::delete('delete-role/{id}', DeleteRoleController::class);
    });
});
