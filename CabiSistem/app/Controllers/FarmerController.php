<?php

namespace App\Controllers;

use App\Models\FarmerRegisterModel;
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
        $name = $request->getPostGet('name');
        $last_name = $request->getPostGet('last_name');
        $mo_last_name = $request->getPostGet('mo_last_name');
        $AKA = $request->getPostGet('AKA');
        $birthdate = $request->getPostGet('birthdate');
        $address = $request->getPostGet('address');
        $phone_num = $request->getPostGet('phone_num');
        $sex = $request->getPostGet('sex');
        $district = $request->getPostGet('district');   
        $watershed = $request->getPostGet('watershed');   
        $parcel_num = $request->getPostGet('parcel_num');   
        $farm_equi = $request->getPostGet('farm_equi');   
        $go_market = $request->getPostGet('go_market');   
        $boundary = $request->getPostGet('boundary');   
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
            'farm_equi' => $farm_equi,
            'go_market' => $go_market,
            'boundary' => $boundary
        ];
        $FarmerController->insert($data);
        echo json_encode('1');
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
