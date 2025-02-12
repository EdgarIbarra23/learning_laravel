<?php

use App\Http\Controllers\api\auth\GetLoggedInUser;
use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::post('login', LoginController::class);

Route::middleware('auth:api')->group(function () {
    Route::get('logged-user', GetLoggedInUser::class);
    Route::post('logout', LogoutController::class);
});
