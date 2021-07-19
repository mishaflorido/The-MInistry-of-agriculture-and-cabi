<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends BaseController
{

    //--------------------------------------------------------------------
    public function insert_user()
    {
        # code...
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $UserModel = new UserModel($db);
        // Getting login Variables
        $name_user = $request->getPostGet('name_user');
        $lastn_user = $request->getPostGet('lastn_user');
        $email_user = $request->getPostGet('email');
        $phone_user = $request->getPostGet('phone');
        $type_user = $request->getPostGet('type_user');
        $psw_user = $request->getPostGet('password');
        $file = $this->request->getFile('img_user');
        $imgName = $file->getRandomName();
        $file->move('./assets/img/user_img', $imgName);

        $data = [
            'name_user' => $name_user,
            'lastn_user' => $lastn_user,
            'email_user' => $email_user,
            'phone_user' => $phone_user,
            'type_user' => $type_user,
            'name_user' => $name_user,
            'psw_user' => $psw_user,
            'img_user' => $imgName
        ];
        $UserModel->insert($data);
        echo json_encode('1');
    }
    public function update_user()
    {
        # code...
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $UserModel = new UserModel($db);
        // Getting login Variables
        $id_user = $request->getPostGet('id_user');
        $name_user = $request->getPostGet('name_user');
        $lastn_user = $request->getPostGet('lastn_user');
        $email_user = $request->getPostGet('email');
        $phone_user = $request->getPostGet('phone');
        $type_user = $request->getPostGet('type_user');
        $psw_user = $request->getPostGet('password');

        $file = $this->request->getFile('img_user');
        if ($file != NULL) {
            $imgName = $file->getRandomName();
            $file->move('./assets/img/user_img', $imgName);
            $data = [
                'name_user' => $name_user,
                'lastn_user' => $lastn_user,
                'email_user' => $email_user,
                'phone_user' => $phone_user,
                'type_user' => $type_user,
                'name_user' => $name_user,
                'img_user' => $imgName
            ];
        
        }
        else{
            $data = [
                'name_user' => $name_user,
                'lastn_user' => $lastn_user,
                'email_user' => $email_user,
                'phone_user' => $phone_user,
                'type_user' => $type_user,
                'name_user' => $name_user,
                           
            ];
        }
        $UserModel->update($id_user, $data);
        echo json_encode('1');
    }
    public function get_users(){
        $UserModel = new UserModel($db);
        $users = $UserModel->findAll();
        echo json_encode($users);

    }
}
