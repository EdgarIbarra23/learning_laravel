<?php

namespace App\Http\Controllers\api\task;

use App\Exceptions\InternalServerErrorException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\task\TasksResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\task\TaskRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetTaskByUserController extends Controller
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
    ) {}

    public function __invoke(int $id): JsonResponse
    {

        $tasks = $this->taskRepository->getByUserId($id);
        $dataTasks = TasksResource::collection($tasks);
        return ApiResponse::OK($dataTasks);
    }
}
