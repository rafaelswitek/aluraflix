<?php

namespace App\Services;

use App\Models\Video;
use Illuminate\Validation\Rules\RequiredIf;

class VideoService extends BaseService
{
    protected function getModel(): Video
    {
        return new Video;
    }

    protected function getRules(bool $saving): array
    {
        return [
            'category_id' => [
                new RequiredIf($saving),
                'exists:categories,id'
            ],
            'title' => [
                new RequiredIf($saving),
                'unique:videos',
                'max:100',
                'min:3'

            ],
            'description' => [
                new RequiredIf($saving),
                'unique:videos',
                'max:250',

            ],
            'url' => [
                new RequiredIf($saving),
                'unique:videos',
                'max:100',
                'url',

            ],
        ];
    }
}
