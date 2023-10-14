<?php

namespace App\Controllers;

use App\Models\FarmRoadModel;


class FarmRoadController extends BaseController
{
    public function get_farm_road()
    {
        $livestock = new FarmRoadModel();
        $result = $livestock->findAll();
        $db = \Config\Database::connect("default");
        $session = \Config\Services::session();
        $db = db_connect();
        $Type_user =  $session->get('type_user');
        $id_user =  $session->get('id_user');
        if ($Type_user == 0) {
            $result = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user,f.*, l1.name_lv1,l1.id_lv1,l2.id_lv2, l2.name_lv2 ,l3.id_lv3,l3.name_lv3 FROM farm_roads_need_attention as f INNER JOIN level1 as l1 on l1.id_lv1 = f.id_lv1 INNER JOIN level2 as l2 on l2.id_lv2 = f.id_lv2 INNER JOIN level3 as l3 on l3.id_lv3 = f.id_lv3 INNER JOIN `user` u on u.id_user = f.id_user where f.deleted_at IS NULL")->getResultArray();
            $db->close();
            echo json_encode($result);
        } else {
            $result = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user,f.*, l1.name_lv1,l1.id_lv1,l2.id_lv2, l2.name_lv2 ,l3.id_lv3,l3.name_lv3 FROM farm_roads_need_attention as f INNER JOIN level1 as l1 on l1.id_lv1 = f.id_lv1 INNER JOIN level2 as l2 on l2.id_lv2 = f.id_lv2 INNER JOIN level3 as l3 on l3.id_lv3 = f.id_lv3 INNER JOIN `user` u on u.id_user = f.id_user where f.id_user =" . $id_user . " and f.deleted_at IS NULL")->getResultArray();
            $db->close();
            echo json_encode($result);
        }
    }
    public function get_farm_road_report()
    {
        $livestock = new FarmRoadModel();
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();

        $date_farm_road = $request->getPostGet('date_farm_road');
        // echo json_encode("SELECT f.*, l1.name_lv1, l2.name_lv2 ,l3.name_lv3 FROM farm_roads_need_attention as f INNER JOIN level1 as l1 on l1.id_lv1 = f.id_lv1 INNER JOIN level2 as l2 on l2.id_lv2 = f.id_lv2 INNER JOIN level3 as l3 on l3.id_lv3 = f.id_lv3 where f.date_farm_road = " . $date_farm_road);

        $result = $db->query("SELECT CONCAT(u.name_user,' ',u.lastn_user) as name_user, f.*, l1.name_lv1, l2.name_lv2 ,l3.name_lv3 FROM farm_roads_need_attention as f INNER JOIN level1 as l1 on l1.id_lv1 = f.id_lv1 INNER JOIN level2 as l2 on l2.id_lv2 = f.id_lv2 INNER JOIN level3 as l3 on l3.id_lv3 = f.id_lv3 INNER JOIN `user` u on u.id_user = f.id_user where f.date_farm_road = '" . $date_farm_road . "'")->getResultArray();
        $db->close();
        echo json_encode($result);
        // $result = $livestock->where("date_farm_road", $date_farm_road)->findAll();

        // echo json_encode($result);
    }
    public function insert_farm_road()
    {
        $farm_road = new FarmRoadModel();
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $date_farm_road = $request->getPostGet('date_farm_road');
        $id_lv1 = $request->getPostGet('id_lv1');
        $id_lv2 = $request->getPostGet('id_lv2');
        if (is_null($request->getPostGet('id_lv3'))) {
            $id_lv3 = 0;
        } else {

            $id_lv3 = $request->getPostGet('id_lv3');
        }
        $road_name = $request->getPostGet('road_name');
        $road_length = $request->getPostGet('road_length');
        $num_farm = $request->getPostGet('num_farm');
        $agr_act = $request->getPostGet('agr_act');
        $work = $request->getPostGet('work');
        $remark = $request->getPostGet('remark');
        $id_user =  $session->get('id_user');
        echo $date_farm_road;
        $data = [
            "date_farm_road" => $date_farm_road,
            "id_lv1" => $id_lv1,
            "id_lv2" => $id_lv2,
            "id_lv3" => $id_lv3,
            "road_name" => $road_name,
            "road_length" => $road_length,
            "num_farm" => $num_farm,
            "agr_act" => $agr_act,
            "work" => $work,
            "remark" => $remark,
            "id_user" => $id_user

        ];
        $farm_road->insert($data);


        echo json_encode(1);
    }
    public function update_farm_road()
    {
        $farm_road = new FarmRoadModel();
        $request = \Config\Services::request();

        $id_farm_road = $request->getPostGet('id_farm_road');
        $date_farm_road = $request->getPostGet('date_farm_road');
        $road_dist = $request->getPostGet('road_dist');
        $road_name = $request->getPostGet('road_name');
        $road_length = $request->getPostGet('road_length');
        $num_farm = $request->getPostGet('num_farm');
        $agr_act = $request->getPostGet('agr_act');
        $work = $request->getPostGet('work');
        $remark = $request->getPostGet('remark');

        echo $date_farm_road;
        $data = [
            "date_farm_road" => $date_farm_road,
            "road_dist" => $road_dist,
            "road_name" => $road_name,
            "road_length" => $road_length,
            "num_farm" => $num_farm,
            "agr_act" => $agr_act,
            "work" => $work,
            "remark" => $remark

        ];
        $farm_road->update($id_farm_road, $data);


        echo json_encode(1);
    }
    public function delete_farm_road()
    {

        $Froad = new FarmRoadModel();

        $request = \Config\Services::request();

        $id_farm_roads  = $request->getPostGet('id_farm_roads');
        $Froad->delete($id_farm_roads);
        echo json_encode("Deleted");
    }
}
