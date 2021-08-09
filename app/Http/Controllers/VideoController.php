<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use App\Services\VideoService;
use Illuminate\Http\JsonResponse;

class VideoController extends BaseController
{
    /**
     * @var VideoService
     */
    protected BaseService $service;

    public function __construct(VideoService $service)
    {
        $this->service = $service;
    }

    public function free(): JsonResponse
    {
        $response = $this->service->free();
        if (!$response['status']) {
            return response()->json($response['errors'], 404);
        }

        return response()->json($response['data'], 200);
    }
}
