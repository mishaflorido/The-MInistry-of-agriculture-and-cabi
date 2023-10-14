<?php

namespace App\Controllers;

use App\Models\CropModel;


class CropController extends BaseController
{
    public function get_variety()
    {
   

     $db = \Config\Database::connect("default");
       $db = db_connect();
       $result = $db->query("SELECT v.*, c.Crop_name from variety as v INNER JOIN crops as c on c.id_crop = v.id_crop where deleted_at IS NULL")->getResultArray();
       $db->close();
       echo json_encode($result);
    }
    public function get_crop()
    {
        $crop = new CropModel();
        $result = $crop->findAll();

        echo json_encode($result);
    }
    public function insert_crop()
    {
        $crop = new CropModel();
        $request = \Config\Services::request();
        $Crop_name = $request->getPostGet('Crop_name');
        $Local_crop_name = $request->getPostGet('Local_crop_name');

        $data = [
            "Crop_name" => $Crop_name,
            "Local_crop_name" => $Local_crop_name,

        ];
        if ($crop->insert($data)) {
            echo json_encode("1");
        };
    }
    public function insert_variety()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_crop = $request->getPostGet('id_crop');
        $name_variety = $request->getPostGet('name_variety');
        if ($db->query("INSERT INTO variety (name_variety, id_crop) values ('" . $name_variety . "', " . $id_crop . ")")) {
            $db->close();
            echo json_encode("1");
        } else {
            $db->close();

            echo json_encode("0");
        }
    }
    public function update_variety()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_crop = $request->getPostGet('id_crop');
        $id_variety = $request->getPostGet('id_variety');
        $name_variety = $request->getPostGet('name_variety');
        if ($db->query("UPDATE variety SET name_variety = '" . $name_variety . "', id_crop = " . $id_crop . " where id_variety = " . $id_variety)) {
            $db->close();
            echo json_encode("1");
        } else {

            $db->close();
            echo json_encode("0");
        }
    }
    public function delete_variety()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_variety = $request->getPostGet('id_variety');
        // echo json_encode("DELETE FROM variety where id_variety = " . $id_variety);
        if ($db->query("UPDATE variety SET deleted_at = '" . date("Y-m-d") . "' where id_variety = " . $id_variety)) {
            echo json_encode("1");
            $db->close();
        } else {

            $db->close();
            echo json_encode("0");
        }
    }
    public function update_crop()
    {
        $crop = new CropModel();
        $request = \Config\Services::request();
        $id_crop = $request->getPostGet('id_crop');
        $Crop_name = $request->getPostGet('Crop_name');
        $Local_crop_name = $request->getPostGet('Local_crop_name');

        $data = [
            "Crop_name" => $Crop_name,
            "Local_crop_name" => $Local_crop_name,

        ];
        if ($crop->update($id_crop, $data)) {
            echo json_encode("1");
        };
    }
    public function delete_crop()
    {
        $crop = new CropModel();
        $request = \Config\Services::request();
        $id_crop = $request->getPostGet('id_crop');



        if ($crop->delete($id_crop)) {
            echo json_encode("1");
        };
    }
}
