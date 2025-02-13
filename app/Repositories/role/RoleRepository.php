<?php

namespace App\Repositories\role;

use App\Interfaces\RepositoryInterface;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class RoleRepository implements RepositoryInterface
{
    public function __construct(
        private readonly Role $role,
    ) {}

    public function getAll(): Collection
    {
        return $this->role->all();
    }

    public function getById(int $id): Model
    {
        return $this->role->query()->findOrFail($id);
    }

    public function create(array $data): Model
    {
        return $this->role->query()->create($data);
    }

    public function update(int $id, array $data): Model
    {
        $role = $this->getById($id);
        $role->update($data);
        return $role;
    }

    public function delete(int $id): void
    {
        $role = $this->getById($id);
        $role->delete();
    }
}
