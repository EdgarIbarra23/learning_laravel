<?php

namespace App\Http\Controllers\api\role;

use App\Http\Controllers\Controller;
use App\Http\Resources\role\RolesResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\role\RoleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllRolesController extends Controller
{
    public function __construct(
        private readonly RoleRepository $roleRepository,
    ){}

    public function __invoke(): JsonResponse
    {
        $roles = $this->roleRepository->getAll();
        $dataRoles = RolesResource::collection($roles);
        return ApiResponse::OK($dataRoles);
    }
}
