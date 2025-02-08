<?php

namespace App\Http\Controllers\api\task;

use App\Http\Controllers\Controller;
use App\Http\Requests\task\TaskRequest;
use App\Http\Resources\task\TasksResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\task\TaskRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostTaskController extends Controller
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
    ) {}

    public function __invoke(TaskRequest $request): JsonResponse
    {
        $data = $request->validated();
        $task = $this->taskRepository->create($data);
        $dataTask = new TasksResource($task);
        return ApiResponse::Create($dataTask);
    }
}
