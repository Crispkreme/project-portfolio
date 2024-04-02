<?php

namespace App\Contracts;

interface AboutContract {

    public function storeAbout($params);
    public function updateAbout($id, $params);
    public function getAbout();
    public function getAboutById($id);
    public function statusAbout($id, $params);
}
