<?php

namespace App\Contracts;

interface BlogContract {

    public function getLimitBlog($paginate);
    public function getBlog();
}
