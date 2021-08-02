<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    abstract protected function getModel(): Model;

    public function list(): Collection
    {
        return $this->getModel()::all();
    }

    public function save(array $data): Model
    {
        return $this->getModel()::create($data);
    }

    public function search(int $id): ?Model
    {
        return $this->getModel()::find($id);
    }

    public function update(int $id, array $data): ?Model
    {
        $model = $this->getModel()::find($id);
        if (!is_null($model)) {
            $model->fill($data);
            $model->save();
        }

        return $model;
    }

    public function delete(int $id): bool
    {
        $model = $this->getModel()::find($id);

        if (is_null($model)) {
            return false;
        }
        $model::destroy($id);
        return true;
    }
}
