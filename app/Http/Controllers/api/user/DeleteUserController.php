<?php

namespace App\Http\Controllers\api\user;

use App\Exceptions\InternalServerErrorException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\HttpResponse\ApiResponse;
use App\Repositories\user\UserRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {}

    public function __invoke(int $id): JsonResponse
    {
        try {
            $this->userRepository->delete($id);
            return ApiResponse::OK();
        } catch (ModelNotFoundException) {
            throw new NotFoundException('El Usuario no existe');
        } catch (Exception $exception) {
            throw new InternalServerErrorException($exception->getMessage());
        }
    }
}
