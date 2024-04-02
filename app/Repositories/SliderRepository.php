<?php

namespace App\Repositories;

use App\Contracts\SliderContract;
use App\Models\Slider;

class SliderRepository implements SliderContract {

    protected $model;

    public function __construct(Slider $model)
    {
        $this->model = $model;
    }

    public function storeSlider($params)
    {
        return $this->model->create($params);
    }

    public function getSlider()
    {
        return $this->model->get();
    }

    public function getSliderById($id) 
    {
        return $this->model->findOrFail($id);
    }

    public function updateSlider($id, $params)
    {
        $slider = $this->model->findOrFail($id);
        $slider->update($params);
        return $slider;
    }

    public function statusSlider($id, $params)
    {
        $slider = $this->model->findOrFail($id);
        $slider->update([
            'isActive' => $params,
        ]);
        return $slider;
    }
}
