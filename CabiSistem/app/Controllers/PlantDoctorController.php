<?php

namespace App\Controllers;

use App\Models\PlantDoctorModel;


class PlantDoctorController extends BaseController
{
    public function get_plant_doctor()
    {
        $p_doctor = new PlantDoctorModel();
        $result = $p_doctor->findAll();

        echo json_encode($result);
    }
    public function insert_plant_doctor()
    {
        $p_doctor = new PlantDoctorModel();
        $request = \Config\Services::request();
        $pdoc_name = $request->getPostGet('pdoc_name');
        $pdoc_lastname = $request->getPostGet('pdoc_lastname');
        $pdoc_phone = $request->getPostGet('pdoc_phone');
        $pdoc_email = $request->getPostGet('pdoc_email');
        $pdoc_ocupation = $request->getPostGet('pdoc_ocupation');
        $pdoc_type_entity = $request->getPostGet('pdoc_type_entity');
        $data = [
            "pdoc_name" => $pdoc_name,
            "pdoc_lastname" => $pdoc_lastname,
            "pdoc_phone" => $pdoc_phone,
            "pdoc_email" => $pdoc_email,
            "pdoc_type_entity" => $pdoc_type_entity,
            "pdoc_ocupation" => $pdoc_ocupation,
        ];
        if ($p_doctor->insert($data)) {
            echo json_encode("1");
        };
    }
    public function update_plant_doctor()
    {
        $p_doctor = new PlantDoctorModel();
        $request = \Config\Services::request();
        $id_plant_doc = $request->getPostGet('id_plant_doc');
        $pdoc_name = $request->getPostGet('pdoc_name');
        $pdoc_lastname = $request->getPostGet('pdoc_lastname');
        $pdoc_phone = $request->getPostGet('pdoc_phone');
        $pdoc_email = $request->getPostGet('pdoc_email');
        $pdoc_ocupation = $request->getPostGet('pdoc_ocupation');
        $pdoc_type_entity = $request->getPostGet('pdoc_type_entity');
        $data = [
            "pdoc_name" => $pdoc_name,
            "pdoc_lastname" => $pdoc_lastname,
            "pdoc_phone" => $pdoc_phone,
            "pdoc_email" => $pdoc_email,
            "pdoc_type_entity" => $pdoc_type_entity,
            "pdoc_ocupation" => $pdoc_ocupation,
        ];
        if ($p_doctor->update($id_plant_doc, $data)) {
            echo json_encode("1");
        };
    }
    public function delete_plant_doctor()
    {
        $p_doctor = new PlantDoctorModel();
        $request = \Config\Services::request();
        $id_plant_doc = $request->getPostGet('id_plant_doc');

        if ($p_doctor->delete($id_plant_doc)) {
            echo json_encode("1");
        };
    }
}
