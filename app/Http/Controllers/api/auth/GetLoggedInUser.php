<?php

namespace App\Http\Controllers\api\auth;

use App\Exceptions\UnauthorizedException;
use App\Http\Controllers\Controller;
use App\Http\Resources\user\UsersResource;
use App\HttpResponse\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetLoggedInUser extends Controller
{
    public function __invoke(): JsonResponse{
        $user = Auth::user();
        
        if ($user) {
            $dataUser = new UsersResource($user);
            return ApiResponse::OK($dataUser);
        } else {
            throw new UnauthorizedException('No ha iniciado sesión. Por favor, inicie sesión para continuar.');
        }
    }
}
