<?php

namespace App\Controllers;

use App\Models\PlantDoctorModel;


class PlantDoctorController extends BaseController
{
    public function get_plant_doctor()
    {
        $p_doctor = new PlantDoctorModel();
        $result = $p_doctor->findAll();

        echo json_encode($result);
    }
}
