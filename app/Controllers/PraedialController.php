<?php

namespace App\Controllers;

use App\Models\PraedialModel;


class PraedialController extends BaseController
{
    public function get_praedial()
    {
        $livestock = new PraedialModel();
        $db = \Config\Database::connect("default");
        $session = \Config\Services::session();
        $db = db_connect();
        $Type_user =  $session->get('type_user');
        $id_user =  $session->get('id_user');
        if ($Type_user == 0) {
            $result = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user,p.* from praedial_lancery as p INNER JOIN `user` u on u.id_user = p.id_user where p.deleted_at IS NULL")->getResultArray();
            $db->close();
            echo json_encode($result);
        } else {
            $result = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user,p.* from praedial_lancery as p INNER JOIN `user` u on u.id_user = p.id_user where p.id_user =" . $id_user . " and p.deleted_at IS NULL")->getResultArray();
            $db->close();
            echo json_encode($result);
        }
        // $result = $livestock->findAll();

    }

    public function get_CropEst_WDC()
    {
        $db = \Config\Database::connect("default");
        $session = \Config\Services::session();
        $db = db_connect();
        $Type_user =  $session->get('type_user');
        $id_user =  $session->get('id_user');
        if ($Type_user == 0) {
            $result = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user,l1.name_lv1, l2.name_lv2,l3.name_lv3,p.*, wdc.* from praedial_lancery as p INNER JOIN `weekly_data_collection` wdc on wdc.id_praedial = p.id_praedial INNER JOIN `user` u on u.id_user = p.id_user INNER JOIN level1 l1 on l1.id_lv1 = p.id_lv1 INNER JOIN level2 l2 on l2.id_lv2 = p.id_lv2 INNER JOIN level3 l3 on l3.id_lv3 = p.id_lv3 where p.deleted_at IS NULL;")->getResultArray();
            $db->close();
            echo json_encode($result);
        } else {
            $result = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user,p.* from praedial_lancery as p INNER JOIN `user` u on u.id_user = p.id_user where p.id_user =" . $id_user . " and p.deleted_at IS NULL")->getResultArray();
            $db->close();
            echo json_encode($result);
        }
    }

    public function get_weekly_data()
    {
        $request = \Config\Services::request();
        $id_praedial = $request->getPostGet('id_praedial');
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $result = $db->query("Select * from weekly_data_collection where id_praedial = " . $id_praedial)->getResultArray();
        $db->close();
        echo json_encode($result);
    }
    public function insert_praedial()
    {
        $praedial = new PraedialModel();
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $registration_number = $request->getPostGet('registration_number');
        $farmer_name = $request->getPostGet('farmer_name');
        $parcel_address = $request->getPostGet('parcel_address');
        $parcel_number = $request->getPostGet('parcel_number');
        $id_lv1 = $request->getPostGet('f_county');
        $id_lv2 = $request->getPostGet('f_subcounty');
        $id_lv3 = $request->getPostGet('id_lv3');
        $id_user =  $session->get('id_user');

        $data = [
            "registration_number" => $registration_number,
            "farmer_name" => $farmer_name,
            "parcel_address" => $parcel_address,
            "parcel_number" => $parcel_number,
            "id_lv1" => $id_lv1,
            "id_lv2" => $id_lv2,
            "id_lv3" => $id_lv3,
            "id_user" => $id_user
        ];
        $praedial->insert($data);
        $lastpredial = $db->query('select * from praedial_lancery ORDER BY id_praedial DESC LIMIT 1')->resultID;
        foreach ($lastpredial as $key => $value) {
            $id_praedial = $value['id_praedial'];
        }
        echo json_encode($id_praedial);
    }
    public function update_praedial()
    {
        $praedial = new PraedialModel();
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_praedial = $request->getPostGet('id_praedial');
        $registration_number = $request->getPostGet('registration_number');
        $farmer_name = $request->getPostGet('farmer_name');
        $parcel_address = $request->getPostGet('parcel_address');
        $parcel_number = $request->getPostGet('parcel_number');
        $id_lv1 = $request->getPostGet('f_county');
        $id_lv2 = $request->getPostGet('f_subcounty');
        $id_lv3 = $request->getPostGet('id_lv3');

        $data = [
            "registration_number" => $registration_number,
            "farmer_name" => $farmer_name,
            "parcel_address" => $parcel_address,
            "parcel_number" => $parcel_number,
            "id_lv1" => $id_lv1,
            "id_lv2" => $id_lv2,
            "id_lv3" => $id_lv3,
        ];
        $praedial->update($id_praedial, $data);
        $lastpredial = $db->query('select * from praedial_lancery ORDER BY id_praedial DESC LIMIT 1')->resultID;
        foreach ($lastpredial as $key => $value) {
            $id_praedial = $value['id_praedial'];
        }
        echo json_encode($id_praedial);
    }
    public function insert_weekly_data_collection()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $crop_name = $request->getPostGet('crop_name');
        $plot_size = $request->getPostGet('plot_size');
        $n_stools = $request->getPostGet('n_stools');
        $date_planted = $request->getPostGet('date_planted');
        $variety = $request->getPostGet('variety');
        $stage_maturity = $request->getPostGet('stage_maturity');
        $harvest_date = $request->getPostGet('harvest_date');
        $yield = $request->getPostGet('yield');
        $activities_carried = $request->getPostGet('activities_carried');
        $taq_arf_moa = $request->getPostGet('taq_arf_moa');
        $n_farm_visits = $request->getPostGet('n_farm_visits');
        $remarks = $request->getPostGet('remarks');
        $id_praedial = $request->getPostGet('id_praedial');
        // echo "INSERT INTO weekly_data_collection(crop_name, plot_size, n_stools, date_planted, variety, stage_maturity,harvest_date, yield, activities_carried, taq_arf_moa, n_farm_visits,remarks, id_praedial) VALUES ('" . $crop_name . "'," . $plot_size . "," . $n_stools . ",'" . $date_planted . "','" . $variety . "','" . $stage_maturity . "','" . $harvest_date . "','" . $yield . "','" . $activities_carried . "','" . $taq_arf_moa . "'," . $n_farm_visits . ",'" . $remarks . "'," . $id_praedial . ")";
        try {
            $db->query("INSERT INTO weekly_data_collection(crop_name, plot_size, n_stools, date_planted, variety, stage_maturity,harvest_date, yield, activities_carried, taq_arf_moa, n_farm_visits,remarks, id_praedial) VALUES ('" . $crop_name . "'," . $plot_size . "," . $n_stools . ",'" . $date_planted . "','" . $variety . "','" . $stage_maturity . "','" . $harvest_date . "','" . $yield . "','" . $activities_carried . "','" . $taq_arf_moa . "'," . $n_farm_visits . ",'" . $remarks . "'," . $id_praedial . ")");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
    }
    public function update_weekly_data_collection()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $id_wdc = $request->getPostGet('id_wdc');
        $crop_name = $request->getPostGet('crop_name');
        $plot_size = $request->getPostGet('plot_size');
        $n_stools = $request->getPostGet('n_stools');
        $date_planted = $request->getPostGet('date_planted');
        $variety = $request->getPostGet('variety');
        $stage_maturity = $request->getPostGet('stage_maturity');
        $harvest_date = $request->getPostGet('harvest_date');
        $yield = $request->getPostGet('yield');
        $activities_carried = $request->getPostGet('activities_carried');
        $taq_arf_moa = $request->getPostGet('taq_arf_moa');
        $n_farm_visits = $request->getPostGet('n_farm_visits');
        $remarks = $request->getPostGet('remarks');
        $id_praedial = $request->getPostGet('id_praedial');
        // echo "UPDATE `weekly_data_collection` SET `crop_name`='$crop_name',`plot_size`='$plot_size' ,`n_stools`='$n_stools',`date_planted`='$date_planted',`variety`='$variety',`stage_maturity`='$stage_maturity',`harvest_date`='$harvest_date',`yield`='$yield',`activities_carried`='$activities_carried',`taq_arf_moa`='$taq_arf_moa' ,`n_farm_visits`='$n_farm_visits',`remarks`='$remarks', WHERE `id_wdc` = '$id_wdc'";
        try {
            $db->query("UPDATE `weekly_data_collection` SET `crop_name`='$crop_name',`plot_size`='$plot_size' ,`n_stools`='$n_stools',`date_planted`='$date_planted',`variety`='$variety',`stage_maturity`='$stage_maturity',`harvest_date`='$harvest_date',`yield`='$yield',`activities_carried`='$activities_carried',`taq_arf_moa`='$taq_arf_moa' ,`n_farm_visits`='$n_farm_visits',`remarks`='$remarks' WHERE `id_wdc` = '$id_wdc'");
            return "Actualizado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
    }
    public function delete_weekly_data_collection()
    {

        $Froad = new PraedialModel();

        $request = \Config\Services::request();

        $id_praedial   = $request->getPostGet('id_praedial');
        $Froad->delete($id_praedial);
        echo json_encode("Deleted");
    }
}
