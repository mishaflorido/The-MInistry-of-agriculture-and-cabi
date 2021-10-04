<?php

namespace App\Controllers;

use App\Models\OficersWeeklyReportModel;


class OficersWeeklyReportController extends BaseController
{
    public function get_of_wr()
    {
        $livestock = new OficersWeeklyReportModel();
        $result = $livestock->findAll();

        echo json_encode($result);
    }
    public function get_endWeek()
    {
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $request = \Config\Services::request();
        $id_of_wr = $request->getPostGet('id_of_wr');
        $result = $db->query("SELECT * FROM `week_end` WHERE `id_of_wr` = " . $id_of_wr . " ORDER BY STR_TO_DATE(`date_rpt_day`,'%d/%m/%Y')")->getResultArray();

        $db->close();
        echo json_encode($result);
    }
    public function get_weekBeginning()
    {
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $request = \Config\Services::request();
        $id_of_wr = $request->getPostGet('id_of_wr');
        $result = $db->query("SELECT * FROM `itinerary_week` WHERE `id_of_wr` = " . $id_of_wr . " ORDER BY STR_TO_DATE(`date_plan_rpt`,'%d/%m/%Y')")->getResultArray();

        $db->close();
        echo json_encode($result);
    }
    public function get_otherActivities()
    {
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $request = \Config\Services::request();
        $id_of_wr = $request->getPostGet('id_of_wr');
        $result = $db->query("SELECT * FROM `other_activ` WHERE `id_of_wr` = " . $id_of_wr)->getResultArray();

        $db->close();
        echo json_encode($result);
    }
    public function insert_of_wr()
    {
        $of_wr = new OficersWeeklyReportModel();
        $db = \Config\Database::connect("default");
        $db = db_connect();
        $request = \Config\Services::request();

        $ofc_name = $request->getPostGet('ofc_name');
        $ofc_desig = $request->getPostGet('ofc_desig');
        $ofc_week = $request->getPostGet('ofc_week');
        $ofc_dpt = $request->getPostGet('ofc_dpt');
        $wk_beg = $request->getPostGet('wk_beg');

        $data = [
            "ofc_name" => $ofc_name,
            "ofc_desig" => $ofc_desig,
            "ofc_week" => $ofc_week,
            "ofc_dpt" => $ofc_dpt,
            "wk_beg" => $wk_beg
        ];
        $of_wr->insert($data);
        $lastOfWR = $db->query('select * from ofice_weekly_report ORDER BY id_of_wr DESC LIMIT 1')->resultID;
        foreach ($lastOfWR as $key => $value) {
            $id_of_wr = $value['id_of_wr'];
        }
        $db->close();
        echo json_encode($id_of_wr);
    }
    public function insert_weeklyend_ofwr()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $date_rpt_day = $request->getPostGet('date_rpt_day');
        $day_ofwr = $request->getPostGet('day_ofwr');
        $name_wkly_rpt = $request->getPostGet('name_wkly_rpt');
        $date_wkly_rpt = $request->getPostGet('date_wkly_rpt');
        $clt_wkly_rpt = $request->getPostGet('clt_wkly_rpt');
        $Adv_wkly_rpt = $request->getPostGet('Adv_wkly_rpt');
        $time_wkly_rpt = $request->getPostGet('time_wkly_rpt');
        $miles_wkly_rpt = $request->getPostGet('miles_wkly_rpt');
        $id_of_wr = $request->getPostGet('id_of_wr');
        echo $date_rpt_day;
        echo "INSERT INTO week_end(id_of_wr, date_rpt_day,day_ofwr, name_wkly_rpt, date_wkly_rpt, clt_wkly_rpt, Adv_wkly_rpt, time_wkly_rpt, miles_wkly_rpt) VALUES (" . $id_of_wr . ",'" . $date_rpt_day . "', '" . $day_ofwr . "','" . $name_wkly_rpt . "','" . $date_wkly_rpt . "','" . $clt_wkly_rpt . "','" . $Adv_wkly_rpt . "'," . $time_wkly_rpt . "," . $miles_wkly_rpt . ")";
        try {
            $db->query("INSERT INTO week_end(id_of_wr, date_rpt_day, day_ofwr, name_wkly_rpt, date_wkly_rpt, clt_wkly_rpt, Adv_wkly_rpt, time_wkly_rpt, miles_wkly_rpt) VALUES (" . $id_of_wr . ",'" . $date_rpt_day . "', '" . $day_ofwr . "','" . $name_wkly_rpt . "','" . $date_wkly_rpt . "','" . $clt_wkly_rpt . "','" . $Adv_wkly_rpt . "'," . $time_wkly_rpt . "," . $miles_wkly_rpt . ")");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
    }
    public function insert_other_activ_ofwr()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $date_other_act = $request->getPostGet('date_other_act');
        $nat_act = $request->getPostGet('nat_act');
        $det_act = $request->getPostGet('det_act');
        $id_of_wr = $request->getPostGet('id_of_wr');

        echo "INSERT INTO other_activ(id_of_wr, date_other_act, nat_act, det_act) VALUES (" . $id_of_wr . ",'" . $date_other_act . "','" . $nat_act . "','" . $det_act . "')";
        try {
            $db->query("INSERT INTO other_activ(id_of_wr, date_other_act, nat_act, det_act) VALUES (" . $id_of_wr . ",'" . $date_other_act . "','" . $nat_act . "','" . $det_act . "')");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
    }
    public function insert_itinerary_week()
    {
        helper('form');
        $db = \Config\Database::connect("default");
        $request = \Config\Services::request();
        $db = db_connect();
        $date_plan_rpt = $request->getPostGet('date_plan_rpt');
        $day_plan_rpt = $request->getPostGet('day_plan_rpt');
        $prp_act = $request->getPostGet('prp_act');
        $name_act = $request->getPostGet('name_act');
        $loc_prp = $request->getPostGet('loc_prp');
        $nat_prp = $request->getPostGet('nat_prp');
        $id_of_wr = $request->getPostGet('id_of_wr');

        echo "INSERT INTO itinerary_week(id_of_wr, date_plan_rpt, day_plan_rpt , prp_act, name_act, loc_prp, nat_prp) VALUES (" . $id_of_wr . ",'" . $date_plan_rpt . "', '" . $day_plan_rpt . "','" . $prp_act . "','" . $name_act . "','" . $loc_prp . "','" . $nat_prp . "')";
        try {
            $db->query("INSERT INTO itinerary_week(id_of_wr, date_plan_rpt, day_plan_rpt , prp_act, name_act, loc_prp, nat_prp) VALUES (" . $id_of_wr . ",'" . $date_plan_rpt . "', '" . $day_plan_rpt . "','" . $prp_act . "','" . $name_act . "','" . $loc_prp . "','" . $nat_prp . "')");
            return "Insertado";
        } catch (\Throwable $th) {
            echo $th;
        }
        $db->close();
    }
}
