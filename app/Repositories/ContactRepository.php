<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Contracts\ContactContract;

class ContactRepository implements ContactContract {

    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function storeContact($params)
    {
        return $this->model->create($params);
    }
}
