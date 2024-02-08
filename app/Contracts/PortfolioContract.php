<?php

namespace App\Contracts;

interface PortfolioContract {

    public function getPortfolio($id);
    public function storePortfolio($params);
}
