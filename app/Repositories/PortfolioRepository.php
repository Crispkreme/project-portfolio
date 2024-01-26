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

    public function getPortfolio()
    {
        return $this->model->latest()->get();
    }
}
