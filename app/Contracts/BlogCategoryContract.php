<?php

namespace App\Contracts;

interface BlogCategoryContract {

    public function getBlogCategory($orderBy, $order);
}
