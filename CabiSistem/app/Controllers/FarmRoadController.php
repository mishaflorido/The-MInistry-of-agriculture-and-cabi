<?php

namespace App\Controllers;

use App\Models\FarmRoadModel;


class FarmRoadController extends BaseController
{
    public function get_farm_road()
    {
        $livestock = new FarmRoadModel();
        $result = $livestock->findAll();

        echo json_encode($result);
    }
    public function insert_farm_road()
    {
        $farm_road = new FarmRoadModel();
        $request = \Config\Services::request();

        $road_dist = $request->getPostGet('road_dist');
        $road_name = $request->getPostGet('road_name');
        $road_length = $request->getPostGet('road_length');
        $num_farm = $request->getPostGet('num_farm');
        $agr_act = $request->getPostGet('agr_act');
        $work = $request->getPostGet('work');
        $remark = $request->getPostGet('remark');


        $data = [
            "road_dist" => $road_dist,
            "road_name" => $road_name,
            "road_length" => $road_length,
            "num_farm" => $num_farm,
            "agr_act" => $agr_act,
            "work" => $work,
            "remark" => $remark

        ];
        $farm_road->insert($data);


        echo json_encode(1);
    }
}
