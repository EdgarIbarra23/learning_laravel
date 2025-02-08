<?php

namespace App\Http\Controllers\api\task;

use App\Exceptions\InternalServerErrorException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\task\TaskRequest;
use App\Http\Resources\task\TasksResource;
use App\HttpResponse\ApiResponse;
use App\Repositories\task\TaskRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateTaskController extends Controller
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
    ) {}

    public function __invoke(TaskRequest $request, int $id): JsonResponse
    {
        try {
            $data = $request->validated();
            $task = $this->taskRepository->update($id, $data);
            $dataTask = new TasksResource($task);
            return ApiResponse::OK($dataTask);
        } catch (ModelNotFoundException) {
            throw new NotFoundException('La tarea no existe');
        } catch (Exception $exception) {
            throw new InternalServerErrorException($exception->getMessage());
        }
    }
}
