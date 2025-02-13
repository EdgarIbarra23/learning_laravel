<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserRequest;
use App\Http\Resources\user\UsersResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\user\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostUserController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {}

    public function __invoke(UserRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->userRepository->create($data);
        $user->assignRole($data['role']);
        $dataUser = new UsersResource($user);
        return ApiResponse::Create($dataUser);
    }
}
