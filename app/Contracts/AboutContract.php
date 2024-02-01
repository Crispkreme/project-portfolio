<?php

namespace App\Contracts;

interface AboutContract {

    public function findAbout($id);
    public function getAboutByUser($id);
    public function storeAbout($params);
}
