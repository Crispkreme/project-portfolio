<?php

namespace App\Repositories;

use App\Contracts\AboutContract;
use App\Models\About;

class AboutRepository implements AboutContract {

    protected $model;

    public function __construct(About $model)
    {
        $this->model = $model;
    }

    public function storeAbout($params)
    {
        return $this->model->create($params);
    }

    public function getAbout()
    {
        return $this->model->get();
    }

    public function getAboutById($id) 
    {
        return $this->model->findOrFail($id);
    }

    public function updateAbout($id, $params)
    {
        $about = $this->model->findOrFail($id);
        $about->update($params);
        return $about;
    }

    public function statusAbout($id, $params)
    {
        $about = $this->model->findOrFail($id);
        $about->update([
            'isActive' => $params,
        ]);
        return $about;
    }

    public function getAboutByStatusId($statusId)
    {
        return $this->model->where('isActive', 1)->first();
    }
}
