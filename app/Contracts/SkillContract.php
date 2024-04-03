<?php

namespace App\Contracts;

interface SkillContract {

    public function storeSkill($params);
    public function updateSkill($id, $params);
    public function getSkill();
    public function getSkillById($id);
    public function statusSkill($id, $params);
}
