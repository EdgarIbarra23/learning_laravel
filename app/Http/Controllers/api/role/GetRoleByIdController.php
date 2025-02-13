<?php

namespace App\Http\Controllers\api\role;

use App\Exceptions\InternalServerErrorException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\role\RolesResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\role\RoleRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetRoleByIdController extends Controller
{
    public function __construct(
        private readonly RoleRepository $roleRepository,
    ) {}

    public function __invoke(int $id): JsonResponse
    {
        try {
            $role = $this->roleRepository->getById($id);
            $dataRole = new RolesResource($role);
            return ApiResponse::OK($dataRole);
        } catch (ModelNotFoundException) {
            throw new NotFoundException('El role no existe');
        } catch (Exception $exception) {
            throw new InternalServerErrorException($exception->getMessage());
        }
    }
}
