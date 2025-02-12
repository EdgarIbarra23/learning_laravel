<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('users')->as('users')->group(
    base_path('routes/resources/user/UserRoutes.php'),
);
Route::prefix('tasks')->as('tasks')->group(
    base_path('routes/resources/task/TaskRoutes.php'),
);
Route::prefix('auth')->as('auth')->group(
    base_path('routes/resources/auth/AuthRoutes.php'),
);
