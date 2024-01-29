<?php

namespace App\Repositories;

use App\Models\ContactDetail;
use App\Contracts\ContactDetailContract;

class ContactDetailRepository implements ContactDetailContract {

    protected $model;

    public function __construct(ContactDetail $model)
    {
        $this->model = $model;
    }

    public function getContactDetailByUserId($id)
    {
        return $this->model
        ->where('id', $id)
        ->first();
    }
}
