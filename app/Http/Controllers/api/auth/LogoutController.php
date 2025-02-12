<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\HttpResponse\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->user()->token()->revoke();

        return ApiResponse::OK();
    }
}
