<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

abstract class BaseService
{
    abstract protected function getModel(): Model;

    abstract protected function getRules(bool $saving): array;

    public function list(?string $search): array
    {
        if (isset($search)) {
            $model = $this->getModel()->where('title', 'like', "%{$search}%")->get();
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
        $model = $this->getModel()::all();

        return [
            "status" => true,
            "data" => $model->toArray()
        ];
    }

    public function save(array $data): array
    {
        $validator = Validator::make($data, $this->getRules(true));
        if ($validator->fails()) {
            return [
                "status" => false,
                "errors" => $validator->errors()
            ];
        }

        $preparedData = $this->prepareSave($data);

        return [
            "status" => true,
            "data" => $this->getModel()::create($preparedData)
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
        $validator = Validator::make($data, $this->getRules(false));
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

    protected function prepareSave(array $data): array
    {
        return $data;
    }
}
