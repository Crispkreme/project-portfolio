<?php

namespace App\Repositories;

use App\Models\About;
use App\Contracts\AboutContract;

class AboutRepository implements AboutContract {

    protected $model;

    public function __construct(About $model)
    {
        $this->model = $model;
    }

    public function findAbout($id)
    {
        return $this->model->find($id);
    }
}
