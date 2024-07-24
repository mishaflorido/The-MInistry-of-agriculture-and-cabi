<?php

namespace App\Controllers;

use App\Models\LivestockModel;


class LivestockController extends BaseController
{
    public function get_livestock()
    {
        $livestock = new LivestockModel();
        $result = $livestock->findAll();

        echo json_encode($result);
    }
}
