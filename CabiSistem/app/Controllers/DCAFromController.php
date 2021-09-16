<?php

namespace App\Controllers;

use App\Models\DCAFormModel;
use PHPUnit\Util\Json;

class DCAFromController extends BaseController
{
    public function get_variety()
    {

        $db = \Config\Database::connect("default");
        $db = db_connect();
        $result = $db->query("select * from variety")->getResultArray();
        $db->close();
        echo json_encode($result);
    }
    public function get_dca()
    {
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $result = $db->query("Select a.*, c.Crop_name, v.name_variety, l2.name_lv2, l3.name_lv3 from dca_form a INNER JOIN crops c on c.id_crop = a.id_crop INNER JOIN variety v on v.id_variety = a.id_variety INNER JOIN level2 l2 on l2.id_lv2 = a.id_lv2 INNER JOIN level3 l3 on l3.id_lv3 = a.id_lv3")->getResultArray();
        $db->close();
        echo json_encode($result);
    }
    public function insert_dca()
    {
        $dcaForm = new DCAFormModel();

        $request = \Config\Services::request();

        $id_plant_doc = $request->getPostGet('id_plant_doc');
        $cli_det = $request->getPostGet('cli_det');
        $farm_name_dca = $request->getPostGet('farm_name_dca');
        $phone_n_dca = $request->getPostGet('phone_n_dca');
        $f_id_dca = $request->getPostGet('f_id_dca');
        $f_sex_dca = $request->getPostGet('f_sex_dca');
        $f_age_dca = $request->getPostGet('f_age_dca');
        $id_lv1 = $request->getPostGet('f_county');
        $id_lv2 = $request->getPostGet('f_subcounty');
        $id_lv3 = $request->getPostGet('f_village');
        $id_crop = $request->getPostGet('id_crop');
        $id_variety = $request->getPostGet('id_variety');
        $sb_dca = $request->getPostGet('sb_dca');
        $dev_stage = $request->getPostGet('dev_stage');
        $pp_afected = $request->getPostGet('pp_afected');
        $yfs_dca = $request->getPostGet('yfs_dca');
        $area_planted = $request->getPostGet('area_planted');
        $unit_ap = $request->getPostGet('unit_ap');
        $per_cafected = $request->getPostGet('per_cafected');
        $symtoms = $request->getPostGet('symtoms');
        $sym_dist = $request->getPostGet('sym_dist');
        $desc_problem = $request->getPostGet('desc_problem');
        $type_problem = $request->getPostGet('t_prob');
        $diagnosis = $request->getPostGet('diagnosis');
        $Cur_cnt = $request->getPostGet('Cur_cnt');
        $rec_type = $request->getPostGet('rec_type');
        $rec_curp = $request->getPostGet('rec_curp');
        $rec_prevp = $request->getPostGet('rec_prevp');
        $s_tolab = $request->getPostGet('s_tolab');
        $sheet_giv = $request->getPostGet('sheet_giv');
        $field_v = $request->getPostGet('field_v');
        $data = [
            "id_plant_doc" => $id_plant_doc,
            "cli_det" => $cli_det,
            "farm_name_dca" => $farm_name_dca,
            "phone_n_dca" => $phone_n_dca,
            "f_id_dca" => $f_id_dca,
            "f_sex_dca" => $f_sex_dca,
            "f_age_dca" => $f_age_dca,
            "id_lv1" => $id_lv1,
            "id_lv2" => $id_lv2,
            "id_lv3" => $id_lv3,
            "id_crop" => $id_crop,
            "id_variety" => $id_variety,
            "sb_dca" => $sb_dca,
            "dev_stage" => $dev_stage,
            "pp_afected" => $pp_afected,
            "yfs_dca" => $yfs_dca,
            "area_planted" => $area_planted,
            "unit_ap" => $unit_ap,
            "per_cafected" => $per_cafected,
            "symtoms" => $symtoms,
            "sym_dist" => $sym_dist,
            "desc_problem" => $desc_problem,
            "type_problem" => $type_problem,
            "diagnosis" => $diagnosis,
            "Cur_cnt" => $Cur_cnt,
            "rec_type" => $rec_type,
            "rec_curp" => $rec_curp,
            "rec_prevp" => $rec_prevp,
            "s_tolab" => $s_tolab,
            "sheet_giv" => $sheet_giv,
            "field_v" => $field_v
        ];
        print_r($data);
        $dcaForm->insert($data);
        echo json_encode(1);
    }
}
