<?php

namespace App\Repositories\task;

use App\Interfaces\RepositoryInterface;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TaskRepository implements RepositoryInterface
{
    public function __construct(
        private readonly Task $task,
    ){}

    public function getAll (): Collection {
        return $this->task->query()->with('user')->get();
    }
    public function getById (int $id): Model {
        return $this->task->query()->with('user')->findOrFail($id);
    }
    public function getByUserId (int $id): Collection  {
        return $this->task->query()->with('user')->where('user_id', $id)->get();
    }
    public function create (array $data): Model {
        return $this->task->query()->create($data);
    }
    public function update (int $id, array $data): Model {
        $task = $this->getById($id);
        $task->update($data);
        return $task;
    }
    public function delete (int $id): void {
        $task = $this->getById($id);
        $task->delete();
    }
}
