<?php

namespace App\Controllers;

use App\Models\CropModel;


class CropController extends BaseController
{
    public function get_crop()
    {
        $crop = new CropModel();
        $result = $crop->findAll();

        echo json_encode($result);
    }
}
