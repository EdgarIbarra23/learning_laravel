<?php

namespace App\Http\Controllers\api\auth;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\HttpResponse\ApiResponse;
use App\Repositories\user\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {}

    public function  __invoke(Request $request): JsonResponse
    {
        try {
            $data = $request->validate([
                'email'     => ['required', 'string'],
                'password'  => ['required', 'string'],
            ]);

            $user = $this->userRepository->getByEmail($data['email']);

            if (!Hash::check($data['password'], $user->password)) {
                throw new NotFoundException('Correo electrónico o contraseña incorrectos');
            }

            $token = $user->createToken('myToken')->accessToken;

            return ApiResponse::OK(['token' => $token]);
        } catch (ModelNotFoundException) {
            throw new NotFoundException('Correo electronico o contraseña incorrecto');
        }
    }
}
