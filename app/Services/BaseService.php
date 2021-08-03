<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

abstract class BaseService
{
    abstract protected function getModel(): Model;

    abstract protected function getRules(): array;

    public function list(): Collection
    {
        return $this->getModel()::all();
    }

    public function save(array $data): array
    {
        $validator = Validator::make($data, $this->getRules());
        if ($validator->fails()) {
            return [
                "status" => false,
                "errors" => $validator->errors()
            ];
        }

        return [
            "status" => true,
            "data" => $this->getModel()::create($data)
        ];
    }

    public function search(int $id): array
    {
        $model = $this->getModel()::find($id);
        if (empty($model)) {
            return [
                "status" => false,
                "errors" => ["error" => "Não encontrado."]
            ];
        }

        return [
            "status" => true,
            "data" => $model
        ];
    }

    public function update(int $id, array $data): array
    {
        $validator = Validator::make($data, $this->getRules());
        if ($validator->fails()) {
            return [
                "status" => false,
                "errors" => $validator->errors()
            ];
        }

        $model = $this->getModel()::find($id);
        if (is_null($model)) {
            return [
                "status" => false,
                "errors" => ["error" => "Não encontrado."]
            ];
        }

        $model->fill($data);
        $model->save();

        return [
            "status" => true,
            "data" => $model
        ];
    }

    public function delete(int $id): array
    {
        $model = $this->getModel()::find($id);
        if (is_null($model)) {
            return [
                "status" => false,
                "errors" => ["error" => "Não encontrado."]
            ];
        }

        $model::destroy($id);
        return [
            "status" => true,
            "data" => ["success" => "ID {$id} apagado."]
        ];
    }
}
