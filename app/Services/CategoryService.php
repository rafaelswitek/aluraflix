<?php

namespace App\Services;

use App\Models\Category;

class CategoryService extends BaseService
{
    protected function getModel(): Category
    {
        return new Category;
    }
}
