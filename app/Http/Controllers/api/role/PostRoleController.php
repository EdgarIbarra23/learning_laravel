<?php

namespace App\Http\Controllers\api\role;

use App\Http\Controllers\Controller;
use App\Http\Requests\role\RoleRequest;
use App\Http\Resources\role\RolesResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\role\RoleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostRoleController extends Controller
{
    public function __construct(
        private readonly RoleRepository $roleRepository,
    ) {}

    public function __invoke(RoleRequest $request): JsonResponse
    {
        $data = $request->validated();
        $role = $this->roleRepository->create($data);
        $dataRole = new RolesResource($role);
        return ApiResponse::Create($dataRole);
    }
}
