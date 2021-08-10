<?php

namespace App\Controllers;

use App\Models\FarmerRegisterModel;
use App\Models\Lv2Model;
use App\Models\Lv3Model;
use App\Models\ParcelRegisterModel;
use CodeIgniter\Controller;

class FarmerController extends BaseController
{

    //--------------------------------------------------------------------
    public function insert_farmer()
    {
        # code...
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $FarmerController = new FarmerRegisterModel($db);
        // Getting login Variables
        $date_reg = $request->getPostGet('date_reg');
        $name = $request->getPostGet('name_f');
        $last_name = $request->getPostGet('last_name_f');
        $mo_last_name = $request->getPostGet('mo_last_name');
        $AKA = $request->getPostGet('aka');
        $birthdate = $request->getPostGet('birthdate');
        $address = $request->getPostGet('address');
        $phone_num = $request->getPostGet('phone_num');
        $sex = $request->getPostGet('sex');
        $district = $request->getPostGet('district');
        $watershed = $request->getPostGet('watershed');
        $parcel_num = $request->getPostGet('parcel_num');
        if ($request->getPostGet('f_pump') != NULL) {
            $fe_pump = $request->getPostGet('f_pump');
        } else {
            $fe_pump = 0;
        }
        if ($request->getPostGet('f_irri') != NULL) {
            $fe_irrig_line = $request->getPostGet('f_irri');
        } else {
            $fe_irrig_line = 0;
        }
        if ($request->getPostGet('f_other') != NULL) {
            $fe_other = $request->getPostGet('f_other');
        } else {
            $fe_other = 0;
        }
        if ($request->getPostGet('fe_other') != NULL) {
            $boundary = $request->getPostGet('boundary');
        } else {
            $boundary = 0;
        }

        $go_market = $request->getPostGet('go_market');

        $data = [
            'date_reg' => $date_reg,
            'name' => $name,
            'last_name' => $last_name,
            'mo_last_name' => $mo_last_name,
            'AKA' => $AKA,
            'birthdate' => $birthdate,
            'address' => $address,
            'phone_num' => $phone_num,
            'sex' => $sex,
            'district' => $district,
            'watershed' => $watershed,
            'parcel_num' => $parcel_num,
            'fe_pump' => $fe_pump,
            'fe_irrig_line' => $fe_irrig_line,
            'fe_other' => $fe_other,
            'go_market' => $go_market,
            'boundary' => $boundary
        ];
        // $FarmerController->insert($data);
        print_r($data);
        $lastFarmer = $db->query('select * from farm_register ORDER BY id_farm DESC LIMIT 1')->resultID;
        foreach ($lastFarmer as $key => $value) {
            $id_farm = $value['id_farm'];
        }

        echo json_encode($id_farm);
    }
    public function insert_boundary()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $name_boundary = $request->getPostGet('name_boundary');
        $id_farm = $request->getPostGet('id_farm');
        // echo $name . " " . $last_name . " " . $id_farm . "esta es la informacion";

        try {
            $db->query("Insert into boundary (id_farm, name_boundary) values (" . $id_farm . ",'" . $name_boundary . "')");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function insert_other_involved()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $name = $request->getPostGet('name');
        $last_name = $request->getPostGet('last_name');
        $id_farm = $request->getPostGet('id_farm');
        // echo $name . " " . $last_name . " " . $id_farm . "esta es la informacion";

        try {
            $db->query("Insert into other_involved (id_farm, name, last_name) values (" . $id_farm . ",'" . $name . "','" . $last_name . "')");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function insert_crop_det()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $name_market = $request->getPostGet('name_market');
        $id_crop = $request->getPostGet('id_crop');
        $id_farm = $request->getPostGet('id_farm');
        // echo $name . " " . $last_name . " " . $id_farm . "esta es la informacion";

        try {
            $db->query("Insert into det_crop_parcel (id_farm, id_crop, name_market) values (" . $id_farm . ",'" . $id_crop . "','" . $name_market . "')");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function insert_middleman()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $name_middleman = $request->getPostGet('m_name');

        $id_farm = $request->getPostGet('id_farm');
        // echo $name . " " . $last_name . " " . $id_farm . "esta es la informacion";

        try {
            $db->query("Insert into middleman_det (id_farm, name_middleman) values (" . $id_farm . ",'" . $name_middleman . "')");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function insert_live_det()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $name_market = $request->getPostGet('name_market');
        $id_livestock = $request->getPostGet('id_livestock');
        $id_farm = $request->getPostGet('id_farm');
        // echo $name . " " . $last_name . " " . $id_farm . "esta es la informacion";

        try {
            $db->query("Insert into det_live_parcel (id_farm, id_livestock, name_market) values (" . $id_farm . ",'" . $id_livestock . "','" . $name_market . "')");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function insert_parcel()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $Parcel = new ParcelRegisterModel();
        $parc_address = $request->getPostGet('parc_address');
        $parc_num = $request->getPostGet('parc_num');
        $parc_acreage = $request->getPostGet('parc_acreage');
        $parc_tenure = $request->getPostGet('parc_tenure');
        $crop_livestock = $request->getPostGet('crop_livestock');
        $id_farm = $request->getPostGet('id_farm');
        $data = [
            'parc_address' => $parc_address,
            'parc_num' => $parc_num,
            'parc_acreage' => $parc_acreage,
            'parc_tenure' => $parc_tenure,
            'crop_livestock' => $crop_livestock,
            'id_farm' => $id_farm

        ];
        // print_r($data);
        $lastParcel = $db->query('select * from farm_parcels ORDER BY id_parcel DESC LIMIT 1')->resultID;
        foreach ($lastParcel as $key => $value) {
            $id_parcel = $value['id_parcel'];
        }

        try {
            $Parcel->insert($data);

            echo json_encode($id_parcel);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function get_parish()
    {
        $parish = new Lv2Model($db);
        $result = $parish->findAll();
        echo json_encode($result);
    }
    public function get_district()
    {
        $distric = new Lv3Model($db);
        $result = $distric->findAll();
        echo json_encode($result);
    }
    public function get_farmer()
    {
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $result = $db->query("SELECT f.*, l3.name_lv3 FROM farm_register f INNER JOIN level3 l3 on l3.id_lv3 = f.district")->getResultArray();
        echo json_encode($result);
    }
    public function get_other_involved()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $id_farm = $request->getPostGet('id_farm');
        $result = $db->query("SELECT name, last_name FROM other_involved where id_farm = " . $id_farm)->getResultArray();
        echo json_encode($result);
    }
    public function update_user()
    {
        //     # code...
        //     helper('form');
        //     $db = \Config\Database::connect("default");
        //     $request = \Config\Services::request();
        //     $db = db_connect();
        //     $UserModel = new UserModel($db);
        //     // Getting login Variables
        //     $id_user = $request->getPostGet('id_user');
        //     $name_user = $request->getPostGet('name_user');
        //     $lastn_user = $request->getPostGet('lastn_user');
        //     $email_user = $request->getPostGet('email');
        //     $phone_user = $request->getPostGet('phone');
        //     $type_user = $request->getPostGet('type_user');
        //     $psw_user = $request->getPostGet('password');

        //     $file = $this->request->getFile('img_user');
        //     if ($file != NULL) {
        //         $imgName = $file->getRandomName();
        //         $file->move('./assets/img/user_img', $imgName);
        //         $data = [
        //             'name_user' => $name_user,
        //             'lastn_user' => $lastn_user,
        //             'email_user' => $email_user,
        //             'phone_user' => $phone_user,
        //             'type_user' => $type_user,
        //             'name_user' => $name_user,
        //             'img_user' => $imgName
        //         ];

        //     }
        //     else{
        //         $data = [
        //             'name_user' => $name_user,
        //             'lastn_user' => $lastn_user,
        //             'email_user' => $email_user,
        //             'phone_user' => $phone_user,
        //             'type_user' => $type_user,
        //             'name_user' => $name_user,

        //         ];
        //     }
        //     $UserModel->update($id_user, $data);
        //     echo json_encode('1');
        // }
        // public function get_users(){
        //     $UserModel = new UserModel($db);
        //     $users = $UserModel->findAll();
        //     echo json_encode($users);

    }
}
