<?php

namespace App\Controllers;

use App\Models\PestAppModel;


class PestAppController extends BaseController
{
    public function get_crop_damage()
    {
        $pestapp = new PestAppModel();
        $result = $pestapp->findAll();

        echo json_encode($result);
    }
    public function insert_pest_app()
    {
        $pest_app = new PestAppModel();
        $request = \Config\Services::request();

        $spsig_pestapp = $request->getPostGet('spsig_pestapp');
        $inf_far = $request->getPostGet('inf_far');
        $date_pestapp = $request->getPostGet('date_pestapp');
        $crop_pestapp = $request->getPostGet('crop_pestapp');
        $plsi_pestapp = $request->getPostGet('plsi_pestapp');
        $targ_pestapp = $request->getPostGet('targ_pestapp');
        $pest_pestapp = $request->getPostGet('pest_pestapp');
        $rate_pestapp = $request->getPostGet('rate_pestapp');
        $amt_pestapp = $request->getPostGet('amt_pestapp');
        $com_pestapp = $request->getPostGet('com_pestapp');
        $data = [
            "spsig_pestapp" => $spsig_pestapp,
            "inf_far" => $inf_far,
            "date_pestapp" => $date_pestapp,
            "crop_pestapp" => $crop_pestapp,
            "plsi_pestapp" => $plsi_pestapp,
            "targ_pestapp" => $targ_pestapp,
            "pest_pestapp" => $pest_pestapp,
            "rate_pestapp" => $rate_pestapp,
            "amt_pestapp" => $amt_pestapp,
            "com_pestapp" => $com_pestapp

        ];
        $pest_app->insert($data);

        echo json_encode("insertado");
    }
}