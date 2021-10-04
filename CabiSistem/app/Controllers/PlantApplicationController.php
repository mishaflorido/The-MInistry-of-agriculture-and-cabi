<?php

namespace App\Controllers;

use App\Models\PlantApplicationModel;


class PlantApplicationController extends BaseController
{
    public function get_plant_application()
    {
        $plant_application = new PlantApplicationModel();
        $result = $plant_application->findAll();

        echo json_encode($result);
    }
    public function get_plant_application_tb1()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_plant_apply = $request->getPostGet('id_plant_apply');
        $result = $db->query("Select tb1.*, c.Crop_name from plant_application_table tb1 INNER JOIN crops c on c.id_crop = tb1.id_crop where tb1.id_plant_apply = " . $id_plant_apply)->getResultArray();
        $db->close();
        echo json_encode($result);
    }
    public function get_plant_application_tb2()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_plant_apply = $request->getPostGet('id_plant_apply');
        $result = $db->query("Select * from pre_plant_insp where id_plant_apply = " . $id_plant_apply)->getResultArray();
        $db->close();
        echo json_encode($result);
    }
    public function get_plant_application_tb3()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_plant_apply = $request->getPostGet('id_plant_apply');
        $result = $db->query("Select * from post_plant_insp where id_plant_apply = " . $id_plant_apply)->getResultArray();
        $db->close();
        echo json_encode($result);
    }
    public function get_plant_application_tb4()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_plant_apply = $request->getPostGet('id_plant_apply');
        $result = $db->query("Select * from future_development where id_plant_apply = " . $id_plant_apply)->getResultArray();
        $db->close();
        echo json_encode($result);
    }
    public function insert_plant_application()
    {
        $plant_application = new PlantApplicationModel();
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $name_f = $request->getPostGet('name_f');
        $last_name_f = $request->getPostGet('last_name_f');
        $mo_last_name = $request->getPostGet('mo_last_name');
        $id_farm = $request->getPostGet('id_farm');
        $f_addres = $request->getPostGet('f_addres');
        $plt_loc = $request->getPostGet('plt_loc');
        $f_phone = $request->getPostGet('f_phone');
        $f_acr = $request->getPostGet('f_acr');
        $f_dst = $request->getPostGet('f_dst');
        $f_date_apl = $request->getPostGet('f_date_apl');
        $plt_ofc = $request->getPostGet('plt_ofc');

        $data = [
            "name_f" => $name_f,
            "last_name_f" => $last_name_f,
            "mo_last_name" => $mo_last_name,
            "id_farm" => $id_farm,
            "f_addres" => $f_addres,
            "plt_loc" => $plt_loc,
            "f_phone" => $f_phone,
            "f_acr" => $f_acr,
            "f_dst" => $f_dst,
            "f_date_apl" => $f_date_apl,
            "plt_ofc" => $plt_ofc
        ];
        $plant_application->insert($data);
        $lastplant = $db->query('select * from plant_application ORDER BY id_plant_apply DESC LIMIT 1')->resultID;
        foreach ($lastplant as $key => $value) {
            $id_plant_apply = $value['id_plant_apply'];
        }
        echo json_encode($id_plant_apply);
        $db->close();
    }
    public function insert_plant_application_table()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $id_crop = $request->getPostGet('plant_crop');
        $plant_req = $request->getPostGet('plant_req');
        $plant_recom = $request->getPostGet('plant_recom');
        $plant_approv = $request->getPostGet('plant_approv');
        $plant_received = $request->getPostGet('plant_received');
        $id_plant_apply = $request->getPostGet('id_plant_apply');

        echo "INSERT INTO plant_application_table(id_crop, plant_req, plant_recom, plant_approv, plant_received, id_plant_apply)VALUES (" . $id_crop . "," . $plant_req . "," . $plant_recom . "," . $plant_approv . "," . $plant_received . "," . $id_plant_apply . ")";
        try {
            $db->query("INSERT INTO plant_application_table(id_crop, plant_req, plant_recom, plant_approv, plant_received, id_plant_apply)VALUES (" . $id_crop . "," . $plant_req . "," . $plant_recom . "," . $plant_approv . "," . $plant_received . "," . $id_plant_apply . ")");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
    }

    public function insert_pre_plant_insp()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $pre_date_visit = $request->getPostGet('pre_date_visit');
        $pre_com = $request->getPostGet('pre_com');
        $extn_officeer = $request->getPostGet('extn_officeer');
        $supervisor = $request->getPostGet('supervisor');
        $id_plant_apply = $request->getPostGet('id_plant_apply');

        try {
            $db->query("INSERT INTO pre_plant_insp(pre_date_visit, pre_com, extn_officeer, supervisor, id_plant_apply) VALUES ('" . $pre_date_visit . "','" . $pre_com . "','" . $extn_officeer . "','" . $supervisor . "'," . $id_plant_apply . ")");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
    }
    public function insert_post_plant_insp()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $pos_date_visit = $request->getPostGet('pos_date_visit');
        $pos_Comments = $request->getPostGet('pos_Comments');
        $extn_officeer_post = $request->getPostGet('extn_officeer_post');
        $supervisor_post = $request->getPostGet('supervisor_post');
        $id_plant_apply = $request->getPostGet('id_plant_apply');

        try {
            $db->query("INSERT INTO post_plant_insp(pos_date_visit, pos_Comments, extn_officeer_post, supervisor_post, id_plant_apply) VALUES ('" . $pos_date_visit . "','" . $pos_Comments . "','" . $extn_officeer_post . "','" . $supervisor_post . "'," . $id_plant_apply . ")");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
    }
    public function insert_future_development()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $fut_dev  = $request->getPostGet('fut_dev');
        $id_plant_apply = $request->getPostGet('id_plant_apply');
        try {
            $db->query("INSERT INTO future_development(fut_dev, id_plant_apply) VALUES ('" . $fut_dev . "'," . $id_plant_apply . ")");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
    }
}
