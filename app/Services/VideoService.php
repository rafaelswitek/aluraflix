<?php

namespace App\Services;

use App\Models\Video;

class VideoService extends BaseService
{
    protected function getModel(): Video
    {
        return new Video;
    }

    protected function getRules(): array
    {
        return [
            'title' => 'required|unique:videos|max:100|min:3',
            'description' => 'required|max:250',
            'url' => 'required|unique:videos|max:100|url',
        ];
    }
}
