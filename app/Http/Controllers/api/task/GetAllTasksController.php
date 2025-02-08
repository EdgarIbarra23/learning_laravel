<?php

namespace App\Http\Controllers\api\task;

use App\Http\Controllers\Controller;
use App\Http\Resources\task\TasksResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\task\TaskRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllTasksController extends Controller
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
    ) {}

    public function __invoke(): JsonResponse
    {
        $tasks = $this->taskRepository->getAll();
        $dataTasks = TasksResource::collection($tasks);
        return ApiResponse::OK($dataTasks);
    }
}
