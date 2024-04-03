<?php

namespace App\Contracts;

interface ExperienceContract {

    public function storeExperience($params);
    public function updateExperience($id, $params);
    public function getExperience();
    public function getExperienceById($id);
    public function statusExperience($id, $params);
    public function getExperienceByStatusId($statusId);
}
