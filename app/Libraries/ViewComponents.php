<?php

namespace App\Libraries;

class ViewComponents
{
    public function getUserCont()
    {
        return view('UserContent');
    }
    public function getStartCont()
    {
        return view('StartPageContent');
    }
    public function getfarmerform()
    {
        return view('FarmerView');
    }
    public function getVendorform()
    {
        return view('VendorView');
    }
    public function getCropDamage()
    {
        return view('CropDamageView');
    }
    public function getFarmerReport()
    {
        return view('FarmerReport');
    }
    public function getFarmRoadform()
    {
        return view('FarmRoadform');
    }
    public function getLarcenyProgramme()
    {
        return view('LarcenyProgramme');
    }
    public function getPlantApplication()
    {
        return view('PlantAplicationForm');
    }
    public function getDCAForm()
    {
        return view('dca_view');
    }
    public function get_weekly_report()
    {
        return view('WeeklyReportView');
    }
    public function get_monthly_report()
    {
        return view('MonthlyReportView');
    }
    public function getDcaReport()
    {
        return view('DCAReportView');
    }
    public function getPesta_frs()
    {
        return view('Pestafrs');
    }
    public function getTesting()
    {
        return view('testingPage');
    }
    public function getCrEstReport()
    {
        return view('CropEstabReport');
    }
    public function getPlantApplicationReport()
    {
        return view('PlanAppReport');
    }
    public function getCropDamageReport()
    {
        return view('CropDamageReport');
    }
    public function getFarmRoadeport()
    {
        return view('FarmRoadReport');
    }
    public function getOfficerWReport()
    {
        return view('WeeklyReport_report');
    }
    public function getPestAppReport()
    {
        return view('PestAppReport');
    }
    public function getOtherCont()
    {
        return view('OtherCont');
    }
    public function getConsolitadion()
    {
        return view('Consolidation_view');
    }
}
