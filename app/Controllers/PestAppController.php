<?php

namespace App\Controllers;

use App\Models\PestAppModel;


class PestAppController extends BaseController
{
    public function get_pest_app()
    {
        $pestapp = new PestAppModel();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $session = \Config\Services::session();
        $Type_user =  $session->get('type_user');
        $id_user =  $session->get('id_user');
        if ($Type_user == 0) {
            $result = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user, p.* FROM  pest_app as p INNER JOIN `user` u on u.id_user = p.id_user where p.deleted_at IS NULL")->getResultArray();
            $db->close();
            echo json_encode($result);
        } else {
            $result = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user, p.* FROM  pest_app as p INNER JOIN `user` u on u.id_user = p.id_user where p.id_user =" . $id_user . " and p.deleted_at IS NULL")->getResultArray();
            $db->close();
            echo json_encode($result);
        }
        // $result = $pestapp->findAll();

        // echo json_encode($result);
    }
    public function delete_pest_app()
    {

        $pestapp = new PestAppModel();

        $request = \Config\Services::request();

        $id_pest_app = $request->getPostGet('id_pest_app');
        $pestapp->delete($id_pest_app);
        echo json_encode("Deleted");
    }
    public function get_pest_app_datebtw()
    {
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $f_date = $request->getPostGet('f_date');
        $l_date = $request->getPostGet('l_date');
        $sup_sig_pdf = $request->getPostGet('sup_sig_pdf');
        $result = $db->query("SELECT * FROM pest_app WHERE spsig_pestapp = '" . $sup_sig_pdf . "' AND date_pestapp BETWEEN '" . $f_date . "' AND '" . $l_date . "'")->getResultArray();
        echo json_encode($result);
    }
    public function insert_pest_app()
    {
        $pest_app = new PestAppModel();
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $spsig_pestapp = $request->getPostGet('spsig_pestapp');
        $farmer_name = $request->getPostGet('farmer_name');
        $farmer_ad = $request->getPostGet('farmer_ad');
        $farmer_tel = $request->getPostGet('farmer_tel');
        $date_pestapp = $request->getPostGet('date_pestapp');
        $crop_pestapp = $request->getPostGet('crop_pestapp');
        $plsi_pestapp = $request->getPostGet('plsi_pestapp');
        $targ_pestapp = $request->getPostGet('targ_pestapp');
        $pest_pestapp = $request->getPostGet('pest_pestapp');
        $rate_pestapp = $request->getPostGet('rate_pestapp');
        $amt_pestapp = $request->getPostGet('amt_pestapp');
        $com_pestapp = $request->getPostGet('com_pestapp');
        $id_user =  $session->get('id_user');
        $data = [
            "spsig_pestapp" => $spsig_pestapp,
            "farmer_name" => $farmer_name,
            "farmer_ad" => $farmer_ad,
            "farmer_tel" => $farmer_tel,
            "date_pestapp" => $date_pestapp,
            "crop_pestapp" => $crop_pestapp,
            "plsi_pestapp" => $plsi_pestapp,
            "targ_pestapp" => $targ_pestapp,
            "pest_pestapp" => $pest_pestapp,
            "rate_pestapp" => $rate_pestapp,
            "amt_pestapp" => $amt_pestapp,
            "com_pestapp" => $com_pestapp,
            "id_user" => $id_user

        ];
        if ($pest_app->insert($data)) {
            # code...
            echo json_encode("insertado");
        } else {

            echo json_encode("No Insertado");
        }
    }
    public function update_pest_app()
    {
        $pest_app = new PestAppModel();
        $request = \Config\Services::request();

        $id_pest_app = $request->getPostGet('id_pest_app');
        $spsig_pestapp = $request->getPostGet('spsig_pestapp');
        $farmer_name = $request->getPostGet('farmer_name');
        $farmer_ad = $request->getPostGet('farmer_ad');
        $farmer_tel = $request->getPostGet('farmer_tel');
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
            "farmer_name" => $farmer_name,
            "farmer_ad" => $farmer_ad,
            "farmer_tel" => $farmer_tel,
            "date_pestapp" => $date_pestapp,
            "crop_pestapp" => $crop_pestapp,
            "plsi_pestapp" => $plsi_pestapp,
            "targ_pestapp" => $targ_pestapp,
            "pest_pestapp" => $pest_pestapp,
            "rate_pestapp" => $rate_pestapp,
            "amt_pestapp" => $amt_pestapp,
            "com_pestapp" => $com_pestapp

        ];
        $pest_app->update($id_pest_app, $data);

        echo json_encode("insertado");
    }
}
