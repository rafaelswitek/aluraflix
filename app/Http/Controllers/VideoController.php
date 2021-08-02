<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use App\Services\VideoService;

class VideoController extends BaseController
{
    protected BaseService $service;

    public function __construct(VideoService $service)
    {
        $this->service = $service;
    }
}
