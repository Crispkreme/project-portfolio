<?php

namespace App\Repositories;

use App\Models\MultiImage;
use App\Contracts\MultiImageContract;

class MultiImageRepository implements MultiImageContract {

    protected $model;

    public function __construct(MultiImage $model)
    {
        $this->model = $model;
    }

    public function getMultiImage($userId)
    {
        return $this->model
        ->where('user_id', $userId)
        ->get();
    }

    public function findMultiImage($id)
    {
        return $this->model
        ->find($id)
        ->first();
    }

    public function storeMultiImage($params)
    {
        return $this->model->create($params);
    }

    public function updateMultiImage($id, $messageParams)
    {
        $multiImage = $this->model->findOrFail($id);
        $multiImage->update($messageParams);
        return $multiImage;
    }
}
