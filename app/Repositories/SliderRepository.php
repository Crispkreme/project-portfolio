<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Contracts\SliderContract;

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
    
    public function getActiveSlider($isActive, $userId)
    {
        return $this->model
        ->where('user_id', $userId)
        ->where('isActive', $isActive)
        ->get();
    }

    public function updateActiveStatusSlider($isActive, $id)
    {
        $slider = $this->model->findOrFail($id);
        $slider->update([
            'isActive' => $isActive,
        ]);
        return $slider;
    }

    public function getSliderByUser($userId)
    {
        return $this->model
        ->where('user_id', $userId)
        ->get();
    }

    public function findSlider($id)
    {
        return $this->model->find($id);
    }

    public function updateSlider($id, $messageParams)
    {
        $slider = $this->model->findOrFail($id);
        $slider->update($messageParams);
        return $slider;
    }
}
