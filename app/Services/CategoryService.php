<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Validation\Rules\RequiredIf;

class CategoryService extends BaseService
{
    protected function getModel(): Category
    {
        return new Category;
    }

    protected function getRules(bool $saving): array
    {
        return [
            'title' => [
                new RequiredIf($saving),
                'unique:categories',
                'max:100',
                'min:3'

            ],
            'color' => [
                new RequiredIf($saving),
                'max:6',
                'min:3',
            ],
        ];
    }

    public function videos(int $id): array
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
            "data" => $model->videos
        ];
    }
}
