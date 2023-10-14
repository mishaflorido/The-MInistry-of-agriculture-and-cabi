<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use PHPUnit\Util\Json;

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
        // echo $file;
        if ($file != "") {
            $imgName = $file->getRandomName();
            $file->move('./assets/img/user_img', $imgName);
        } else {
            $imgName = "";
        }

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
        // echo "hola";
        $result = $db->query("Select * from user where email_user = '" . $email_user . "' and deleted_at = null")->getNumRows();


        if ($result == 0) {
            $UserModel->insert($data);
            echo json_encode('0');
        } else {
            echo json_encode('1');
        }
    }
    public function update_userInfo()
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
        $email_user = $request->getPostGet('email_user');
        $phone_user = $request->getPostGet('phone_user');
        $type_user = $request->getPostGet('type_user');
        $psw_user = $request->getPostGet('psw_user');

        // $file = $this->request->getFile('img_user');
        // if ($file != NULL) {
        // $imgName = $file->getRandomName();
        // $file->move('./assets/img/user_img', $imgName);
        // $data = [
        //     'name_user' => $name_user,
        //     'lastn_user' => $lastn_user,
        //     'email_user' => $email_user,
        //     'phone_user' => $phone_user,
        //     'type_user' => $type_user,
        //     'name_user' => $name_user,
        //     'img_user' => $imgName
        // ];
        // } else {
        $data = [
            'name_user' => $name_user,
            'lastn_user' => $lastn_user,
            'email_user' => $email_user,
            'phone_user' => $phone_user,
            'type_user' => $type_user,
            'psw_user' => $psw_user,

        ];
        // }
        $UserModel->update($id_user, $data);
        echo json_encode('Updated Correctly');
        $db->close();
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
        $email_user = $request->getPostGet('email_user');
        $phone_user = $request->getPostGet('phone_user');
        $type_user = $request->getPostGet('type_user');
        $psw_user = $request->getPostGet('psw_user');

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
                'psw_user' => $psw_user,
                'img_user' => $imgName
            ];
        } else {
            $data = [
                'name_user' => $name_user,
                'lastn_user' => $lastn_user,
                'email_user' => $email_user,
                'phone_user' => $phone_user,
                'type_user' => $type_user,
                'psw_user' => $psw_user,

            ];
        }
        $UserModel->update($id_user, $data);
        echo json_encode('1');
        $db->close();
    }
    public function get_users()
    {
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $UserModel = new UserModel($db);
        $users = $UserModel->findAll();
        echo json_encode($users);
        $db->close();
    }
    public function delete_users()
    {
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $request = \Config\Services::request();
        $UserModel = new UserModel($db);
        $id_user = $request->getPostGet('id_user');

        $UserModel->where("id_user", $id_user)->delete();
        echo json_encode("1");
    }
}
