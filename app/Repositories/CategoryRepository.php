<?php

namespace App\Repositories;

use App\Models\Category;
use App\Contracts\CategoryContract;

class CategoryRepository implements CategoryContract {

    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getCategory($orderBy, $order)
    {
        return $this->model
        ->orderBy($orderBy, $order)
        ->get();
    }
}
