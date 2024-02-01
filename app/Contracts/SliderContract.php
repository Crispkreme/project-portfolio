<?php

namespace App\Contracts;

interface SliderContract {

    public function storeSlider($params);
    public function getActiveSlider($isActive, $userId);
    public function updateActiveStatusSlider($isActive, $id);
    public function getSliderByUser($userId);
    public function findSlider($id);
    public function updateSlider($id, $messageParams);
}
