<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserRequest;
use App\Http\Resources\user\UsersResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\user\UserRepository;
use App\Services\mail\SendMail;
use App\Services\notification\SendNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostUserController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly SendMail $sendMail,
        private readonly SendNotification $sendNotification,
    ) {}

    public function __invoke(UserRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->userRepository->create($data);
        $user->assignRole($data['role']);
        $dataUser = new UsersResource($user);
        $this->sendMail->SendUserEmail($dataUser->email, $dataUser, 'Learning Laravel Email', 'mail.RegisterClient');
        $this->sendNotification->notification(['message' => 'Nuevo usuario Creado'], $dataUser->id);
        return ApiResponse::Create($dataUser);
    }
}
