<?php

namespace App\Http\Controllers\api\role;

use App\Exceptions\InternalServerErrorException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\HttpResponse\ApiResponse;
use App\Repositories\role\RoleRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeleteRoleController extends Controller
{
    public function __construct(
        private readonly RoleRepository $roleRepository,
    ) {}

    public function __invoke(int $id): JsonResponse
    {
        try {
            $this->roleRepository->delete($id);
            return ApiResponse::OK();
        } catch (ModelNotFoundException) {
            throw new NotFoundException('El role no existe');
        } catch (Exception $exception) {
            throw new InternalServerErrorException($exception->getMessage());
        }
    }
}
