<?php

namespace App\Repositories;

use App\Models\Portfolio;
use App\Contracts\PortfolioContract;

class PortfolioRepository implements PortfolioContract {

    protected $model;

    public function __construct(Portfolio $model)
    {
        $this->model = $model;
    }

    public function getPortfolio($id)
    {
        return $this->model
        ->where('user_id', $id)
        ->get();
    }
}
