<?php

namespace App\Contracts;

interface CategoryContract {

    public function getCategory($orderBy, $order);
}
