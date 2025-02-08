<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Http\Resources\user\UsersResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\user\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllUsersController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ){}

    public function __invoke(): JsonResponse
    {
        $users = $this->userRepository->getAll();
        $dataUsers = UsersResource::collection($users);
        return ApiResponse::OK($dataUsers);
    }
}
