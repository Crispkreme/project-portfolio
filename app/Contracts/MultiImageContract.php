<?php

namespace App\Contracts;

interface MultiImageContract {

    public function getMultiImage($userId);
    public function findMultiImage($id);
    public function storeMultiImage($params);
    public function updateMultiImage($id, $messageParams);
}
