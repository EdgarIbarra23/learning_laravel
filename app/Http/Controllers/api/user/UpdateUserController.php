<?php

namespace App\Http\Controllers\api\user;

use App\Exceptions\InternalServerErrorException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserRequest;
use App\Http\Resources\user\UsersResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\user\UserRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {}

    public function __invoke(UserRequest $request, int $id): JsonResponse
    {
        try {
            $data = $request->validated();
            $user = $this->userRepository->update($id, $data);
            $dataUser = new UsersResource($user);
            return ApiResponse::OK($dataUser);
        } catch (ModelNotFoundException) {
            throw new NotFoundException('El Usuario no existe');
        } catch (Exception $exception) {
            throw new InternalServerErrorException($exception->getMessage());
        }
    }
}
