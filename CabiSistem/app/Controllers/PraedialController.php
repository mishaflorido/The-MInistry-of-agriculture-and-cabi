<?php

namespace App\Controllers;

use App\Models\PraedialModel;


class PraedialController extends BaseController
{
    public function get_praedial()
    {
        $livestock = new PraedialModel();
        $result = $livestock->findAll();

        echo json_encode($result);
    }
    public function get_weekly_data()
    {
        $request = \Config\Services::request();
        $id_praedial = $request->getPostGet('id_praedial');
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $result = $db->query("Select * from weekly_data_collection where id_praedial = " . $id_praedial)->getResultArray();

        echo json_encode($result);
    }
    public function insert_praedial()
    {
        $praedial = new PraedialModel();
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $registration_number = $request->getPostGet('registration_number');
        $farmer_name = $request->getPostGet('farmer_name');
        $parcel_address = $request->getPostGet('parcel_address');
        $parcel_number = $request->getPostGet('parcel_number');

        $data = [
            "registration_number" => $registration_number,
            "farmer_name" => $farmer_name,
            "parcel_address" => $parcel_address,
            "parcel_number" => $parcel_number,
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

        $data = [
            "registration_number" => $registration_number,
            "farmer_name" => $farmer_name,
            "parcel_address" => $parcel_address,
            "parcel_number" => $parcel_number,
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
}
