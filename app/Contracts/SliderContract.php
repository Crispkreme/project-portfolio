<?php

namespace App\Contracts;

interface SliderContract {

    public function storeSlider($params);
    public function updateSlider($id, $params);
    public function getSlider();
    public function getSliderById($id);
    public function statusSlider($id, $params);
}
