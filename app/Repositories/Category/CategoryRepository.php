<?php

namespace App\Repositories\Category;

use App\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function findById($id)
    {
        return Category::findOrFail($id);
    }
}