<?php

namespace App\Controllers;




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
}
