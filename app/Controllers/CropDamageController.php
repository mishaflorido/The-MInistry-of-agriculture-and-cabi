<?php

namespace App\Controllers;

use App\Models\CropDamageModel;


class CropDamageController extends BaseController
{
    public function get_cropd_tb1()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_crop_damage = $request->getPostGet('id_crop_damage');
        $res = $db->query("Select * from crop_damage_table1 where id_crop_damage = " . $id_crop_damage)->getResultArray();
        echo json_encode($res);
        $db->close();
    }
    public function get_cropd_tb2()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_crop_damage = $request->getPostGet('id_crop_damage');
        $res = $db->query("Select * from crop_damage_table2 where id_crop_damage = " . $id_crop_damage)->getResultArray();
        echo json_encode($res);
        $db->close();
    }
    public function get_crop_damage()
    {
        $livestock = new CropDamageModel();
        $db = \Config\Database::connect("default");
        $session = \Config\Services::session();
        $db = db_connect();
        $Type_user =  $session->get('type_user');
        $id_user =  $session->get('id_user');
        if ($Type_user == 0) {
            // $result = $livestock->findAll();
            $res = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user, cd.* FROM crop_damage as cd INNER JOIN `user` u on u.id_user = cd.id_user where cd.deleted_at IS NULL")->getResultArray();
            $db->close();
            echo json_encode($res);
        } else {
            $result = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user, cd.* FROM crop_damage as cd INNER JOIN `user` u on u.id_user = cd.id_user where cd.id_user =" . $id_user . " and cd.deleted_at IS NULL")->getResultArray();
            $db->close();
            echo json_encode($result);
        }
    }
    public function delete_crop_damage()
    {

        $crop_damage = new CropDamageModel();

        $request = \Config\Services::request();

        $id_crop_damage = $request->getPostGet('id_crop_damage');
        $crop_damage->delete($id_crop_damage);
        echo json_encode("Deleted");
    }
    public function insert_crop_damage()
    {
        $crop_damage = new CropDamageModel();
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $session = \Config\Services::session();
        $db = db_connect();
        $cdf_ext_dist = $request->getPostGet('cdf_ext_dist');
        $cdf_date_dis = $request->getPostGet('cdf_date_dis');
        $cdf_typ_dis = $request->getPostGet('cdf_typ_dis');
        $id_user =  $session->get('id_user');
        $data = [
            "cdf_ext_dist" => $cdf_ext_dist,
            "cdf_date_dis" => $cdf_date_dis,
            "cdf_typ_dis" => $cdf_typ_dis,
            "id_user" => $id_user
        ];
        $crop_damage->insert($data);
        $lastCropDamage = $db->query('select * from crop_damage ORDER BY id_crop_damage DESC LIMIT 1')->resultID;
        foreach ($lastCropDamage as $key => $value) {
            $id_crop_damage = $value['id_crop_damage'];
        }

        echo json_encode($id_crop_damage);
        $db->close();
    }
    public function update_crop_damage()
    {
        $crop_damage = new CropDamageModel();
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_crop_damage = $request->getPostGet('id_crop_damage');
        $cdf_ext_dist = $request->getPostGet('cdf_ext_dist');
        $cdf_date_dis = $request->getPostGet('cdf_date_dis');
        $cdf_typ_dis = $request->getPostGet('cdf_typ_dis');
        $data = [
            "cdf_ext_dist" => $cdf_ext_dist,
            "cdf_date_dis" => $cdf_date_dis,
            "cdf_typ_dis" => $cdf_typ_dis
        ];
        $crop_damage->update($id_crop_damage, $data);
        // $lastCropDamage = $db->query('select * from crop_damage ORDER BY id_crop_damage DESC LIMIT 1')->resultID;
        // foreach ($lastCropDamage as $key => $value) {
        //     $id_crop_damage = $value['id_crop_damage'];
        // }

        $db->close();
        echo json_encode($id_crop_damage);
    }
    public function update_crop_damage_tb1()
    {
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $id_cd_table1 = $request->getPostGet('id_cd_table1');
        $farmer_name_crd = $request->getPostGet('farmer_name_crd');
        $visit_date_crd = $request->getPostGet('visit_date_crd');
        $farmer_reg_crd = $request->getPostGet('farmer_reg_crd');
        $contact_crd = $request->getPostGet('contact_crd');
        $cropdmg_name = $request->getPostGet('cropdmg_name');
        $crop_var_crd = $request->getPostGet('crop_var_crd');
        $location_crd = $request->getPostGet('location_crd');
        $tot_acre_crd = $request->getPostGet('tot_acre_crd');
        $desc_dmg_crd = $request->getPostGet('desc_dmg_crd');
        $area_plot_crd = $request->getPostGet('area_plot_crd');
        $id_crop_damage = $request->getPostGet('id_crop_damage');
        // echo $name . " " . $last_name . " " . $id_farm . "esta es la informacion";
        echo "update";

        try {
            $db->query("UPDATE crop_damage_table1 SET farmer_name_crd = '" . $farmer_name_crd . "',visit_date_crd = '" . $visit_date_crd . "',farmer_reg_crd = '" . $farmer_reg_crd . "',
            contact_crd = '" . $contact_crd . "',crop_var_crd = '" . $crop_var_crd . "',cropdmg_name = '" . $cropdmg_name ."',location_crd = '" . $location_crd . "',tot_acre_crd = '" . $tot_acre_crd . "',
            desc_dmg_crd = '" . $desc_dmg_crd . "',area_plot_crd = '" . $area_plot_crd . "' WHERE id_cd_table1 = " . $id_cd_table1);
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
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
        $cropdmg_name = $request->getPostGet('cropdmg_name');
        $crop_var_crd = $request->getPostGet('crop_var_crd');
        $location_crd = $request->getPostGet('location_crd');
        $tot_acre_crd = $request->getPostGet('tot_acre_crd');
        $desc_dmg_crd = $request->getPostGet('desc_dmg_crd');
        $area_plot_crd = $request->getPostGet('area_plot_crd');
        $id_crop_damage = $request->getPostGet('id_crop_damage');
        // echo $name . " " . $last_name . " " . $id_farm . "esta es la informacion";

       // echo "insert";
       // echo "INSERT INTO crop_damage_table1(farmer_name_crd, visit_date_crd, farmer_reg_crd, contact_crd, crop_var_crd, location_crd,tot_acre_crd, desc_dmg_crd, area_plot_crd, id_crop_damage) " .
         //   "VALUES ('" . $farmer_name_crd . "','" . $visit_date_crd . "'," . $farmer_reg_crd . ",'" . $contact_crd . "','" . $crop_var_crd . "','" . $location_crd . "','" . $tot_acre_crd . "','" . $desc_dmg_crd . "','" . $area_plot_crd . "'," . $id_crop_damage . ")";
        try {
            $db->query("INSERT INTO crop_damage_table1(farmer_name_crd, visit_date_crd, farmer_reg_crd, contact_crd, crop_var_crd, cropdmg_name, location_crd,tot_acre_crd, desc_dmg_crd, area_plot_crd, id_crop_damage) " .
                "VALUES ('" . $farmer_name_crd . "','" . $visit_date_crd . "','" . $farmer_reg_crd . "','" . $contact_crd . "','" . $crop_var_crd . "','" .$cropdmg_name ."','".$location_crd . "','" . $tot_acre_crd . "','" . $desc_dmg_crd . "','" . $area_plot_crd . "'," . $id_crop_damage . ")");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
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
        echo "insert";
        echo "INSERT INTO crop_damage_table2(num_stools, amount, age_plants, stage_mat, cost_plant, tot_val,ofc_collec, cert_by, remark_stools, id_crop_damage) " .
            "VALUES (" . $num_stools . "," . $amount . "," . $age_plants . ",'" . $stage_mat . "'," . $cost_plant . "," . $tot_val . ",'" . $ofc_collec . "','" . $cert_by . "','" . $remark_stools . "'," . $id_crop_damage . ")";
        try {
            $db->query("INSERT INTO crop_damage_table2(num_stools, amount, age_plants, stage_mat, cost_plant, tot_val,ofc_collec, cert_by, remark_stools, id_crop_damage) " .
                "VALUES (" . $num_stools . "," . $amount . "," . $age_plants . ",'" . $stage_mat . "'," . $cost_plant . "," . $tot_val . ",'" . $ofc_collec . "','" . $cert_by . "','" . $remark_stools . "'," . $id_crop_damage . ")");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function update_crop_damage_tb2()
    {
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $id_cd_stool = $request->getPostGet('id_cd_stool');
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
        echo "update";
        try {
            $db->query("UPDATE crop_damage_table2 SET num_stools = '" . $num_stools . "',amount = '" . $amount . "',age_plants = '" . $age_plants . "',
            stage_mat = '" . $stage_mat . "',cost_plant = '" . $cost_plant . "',tot_val = '" . $tot_val . "',ofc_collec = '" . $ofc_collec . "',
            cert_by = '" . $cert_by . "',remark_stools = '" . $remark_stools . "' WHERE id_cd_stool = " . $id_cd_stool);
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
