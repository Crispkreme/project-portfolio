<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Contracts\BlogContract;

class BlogRepository implements BlogContract {

    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function getLimitBlog($paginate)
    {
        return $this->model
        ->latest()
        ->paginate($paginate);
    }

    public function getBlog()
    {
        return $this->model->get();
    }
}
