<?php

namespace App\Services;

use App\Models\Video;

class VideoService extends BaseService
{
    protected function getModel(): Video
    {
        return new Video;
    }
}
