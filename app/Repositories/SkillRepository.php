<?php

namespace App\Repositories;

use App\Contracts\SkillContract;
use App\Models\Skill;

class SkillRepository implements SkillContract {

    protected $model;

    public function __construct(Skill $model)
    {
        $this->model = $model;
    }

    public function storeSkill($params)
    {
        return $this->model->create($params);
    }

    public function getSkill()
    {
        return $this->model->get();
    }

    public function getSkillById($id) 
    {
        return $this->model->findOrFail($id);
    }

    public function updateSkill($id, $params)
    {
        $skill = $this->model->findOrFail($id);
        $skill->update($params);
        return $skill;
    }

    public function statusSkill($id, $params)
    {
        $skill = $this->model->findOrFail($id);
        $skill->update([
            'isActive' => $params,
        ]);
        return $skill;
    }
}
