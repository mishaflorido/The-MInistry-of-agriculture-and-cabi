<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Log_in_out extends BaseController
{

    //--------------------------------------------------------------------
    public function log_users()
    {
        
        # code...
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $UserModel = new UserModel($db);
        $session = \Config\Services::session();

        // Getting login Variables
        $email = $request->getPostGet('email_user');
        $password = $request->getPostGet('psw_user');

        // Set request to Data Base
        $user = $UserModel->where('email_user', $email)->where('psw_user', $password)->findAll();
        

        if ($user != null) {

            foreach ($user as $key => $value) {
                $data_session = [
                    'id_user' => $value['id_user'],
                    'username' => $value['name_user'] . " " . $value['lastn_user'],
                    'email' => $value['email_user'],
                    'type_user' => $value['type_user'],
                    'img_user' => $value['img_user']
                ];
                $data = [
                    'id_user' => $value['id_user'],
                    'username' => $value['name_user'],
                    'lastn_user' => $value['lastn_user'],
                    'email' => $value['email_user'],
                    'phone' => $value['phone_user'],
                    'type_user' => $value['type_user'],
                    'img_user' => $value['img_user']
                ];
            }

            $session->set($data_session);

            return view('MainMenu', $data);
        } else {
            return ("usuario desconocido");
        };
    }

    public function log_out()
    {

        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to(base_url()."/");
    }
}
