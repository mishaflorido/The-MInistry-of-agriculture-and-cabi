<?php

namespace App\Controllers;

use App\Models\CropDamageModel;


class CropDamageController extends BaseController
{
    public function get_crop_damage()
    {
        $livestock = new CropDamageModel();
        $result = $livestock->findAll();

        echo json_encode($result);
    }
    public function insert_crop_damage()
    {
        $crop_damage = new CropDamageModel();
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $cdf_ext_dist = $request->getPostGet('cdf_ext_dist');
        $cdf_date_dis = $request->getPostGet('cdf_date_dis');
        $cdf_typ_dis = $request->getPostGet('cdf_typ_dis');
        $data = [
            "cdf_ext_dist" => $cdf_ext_dist,
            "cdf_date_dis" => $cdf_date_dis,
            "cdf_typ_dis" => $cdf_typ_dis
        ];
        $crop_damage->insert($data);
        $lastCropDamage = $db->query('select * from crop_damage ORDER BY id_crop_damage DESC LIMIT 1')->resultID;
        foreach ($lastCropDamage as $key => $value) {
            $id_crop_damage = $value['id_crop_damage'];
        }

        echo json_encode($id_crop_damage);
    }
    public function insert_crop_damage_tb1()
    {
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $farmer_name_crd = $request->getPostGet('farmer_name_crd');
        $visit_date_crd = $request->getPostGet('visit_date_crd');
        $farmer_reg_crd = $request->getPostGet('farmer_reg_crd');
        $contact_crd = $request->getPostGet('contact_crd');
        $crop_var_crd = $request->getPostGet('crop_var_crd');
        $location_crd = $request->getPostGet('location_crd');
        $tot_acre_crd = $request->getPostGet('tot_acre_crd');
        $desc_dmg_crd = $request->getPostGet('desc_dmg_crd');
        $area_plot_crd = $request->getPostGet('area_plot_crd');
        $id_crop_damage = $request->getPostGet('id_crop_damage');
        // echo $name . " " . $last_name . " " . $id_farm . "esta es la informacion";


        try {
            $db->query("INSERT INTO crop_damage_table1(farmer_name_crd, visit_date_crd, farmer_reg_crd, contact_crd, crop_var_crd, location_crd,tot_acre_crd, desc_dmg_crd, area_plot_crd, id_crop_damage) " .
                "VALUES ('" . $farmer_name_crd . "','" . $visit_date_crd . "'," . $farmer_reg_crd . ",'" . $contact_crd . "','" . $crop_var_crd . "','" . $location_crd . "','" . $tot_acre_crd . "','" . $desc_dmg_crd . "','" . $area_plot_crd . "'," . $id_crop_damage . ")");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function insert_crop_damage_tb2()
    {
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $num_stools = $request->getPostGet('num_stools');
        $amount = $request->getPostGet('amount');
        $age_plants = $request->getPostGet('age_plants');
        $stage_mat = $request->getPostGet('stage_mat');
        $cost_plant = $request->getPostGet('cost_plant');
        $tot_val = $request->getPostGet('tot_val');
        $ofc_collec = $request->getPostGet('ofc_collec');
        $cert_by = $request->getPostGet('cert_by');
        $remark_stools = $request->getPostGet('remark_stools');
        $id_crop_damage = $request->getPostGet('id_crop_damage');
        // echo $name . " " . $last_name . " " . $id_farm . "esta es la informacion";

        try {
            $db->query("INSERT INTO crop_damage_table2(num_stools, amount, age_plants, stage_mat, cost_plant, tot_val,ofc_collec, cert_by, remark_stools, id_crop_damage) " .
                "VALUES (" . $num_stools . "," . $amount . "," . $age_plants . ",'" . $stage_mat . "'," . $cost_plant . "," . $tot_val . ",'" . $ofc_collec . "','" . $cert_by . "','" . $remark_stools . "'," . $id_crop_damage . ")");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
