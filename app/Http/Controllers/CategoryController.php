<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\BaseService;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends BaseController
{
    /**
     * @var CategoryService
     */
    protected BaseService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function videos(int $id): JsonResponse
    {
        $response = $this->service->videos($id);
        if (!$response['status']) {
            return response()->json($response['errors'], 404);
        }

        return response()->json($response['data'], 200);
    }
}
