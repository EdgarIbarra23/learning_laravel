<?php

namespace App\Repositories\user;

use App\Interfaces\RepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements RepositoryInterface
{
    public function __construct(
        private readonly User $user,
    ) {}

    public function getAll (): Collection {
        return $this->user->all();
    }
    public function getById (int $id): Model {
        return $this->user->query()->findOrFail($id);
    }
    public function getByEmail (string $email): Model {
        return $this->user->query()->where('email', $email)->firstOrFail();
    }
    public function create (array $data): Model {
        return $this->user->query()->create($data);
    }
    public function update (int $id, array $data): Model {
        $user = $this->getById($id);
        $user->update($data);
        return $user;
    }
    public function delete (int $id): void {
        $user = $this->getById($id);
        $user->delete();
    }
}
