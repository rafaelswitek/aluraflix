<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use App\Services\CategoryService;

class CategoryController extends BaseController
{
    protected BaseService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
}
