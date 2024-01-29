<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use App\Contracts\BlogCategoryContract;

class BlogCategoryRepository implements BlogCategoryContract {

    protected $model;

    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
    }

    public function getBlogCategory($orderBy, $order)
    {
        return $this->model
        ->orderBy($orderBy, $order)
        ->get();
    }
}
