<?php

namespace App\Repositories;

use App\Contracts\ExperienceContract;
use App\Models\Experience;

class ExperienceRepository implements ExperienceContract {

    protected $model;

    public function __construct(Experience $model)
    {
        $this->model = $model;
    }

    public function storeExperience($params)
    {
        return $this->model->create($params);
    }

    public function getExperience()
    {
        return $this->model->get();
    }

    public function getExperienceById($id) 
    {
        return $this->model->findOrFail($id);
    }

    public function updateExperience($id, $params)
    {
        $experience = $this->model->findOrFail($id);
        $experience->update($params);
        return $experience;
    }

    public function statusExperience($id, $params)
    {
        $experience = $this->model->findOrFail($id);
        $experience->update([
            'isActive' => $params,
        ]);
        return $experience;
    }

    public function getExperienceByStatusId($statusId)
    {
        return $this->model->where('isActive', 1)->first();
    }
}
