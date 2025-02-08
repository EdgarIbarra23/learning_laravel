<?php

namespace App\Http\Controllers\api\user;

use App\Exceptions\InternalServerErrorException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\user\UsersResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\user\UserRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetUserByEmailController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {}

    public function __invoke(string $email): JsonResponse
    {
        try {
            $user = $this->userRepository->getByEmail($email);
            $dataUser = new UsersResource($user);
            return ApiResponse::OK($dataUser);
        } catch (ModelNotFoundException) {
            throw new NotFoundException('El Usuario no existe');
        } catch (Exception $exception) {
            throw new InternalServerErrorException($exception->getMessage());
        }
    }
}
