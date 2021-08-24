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
    public function getFarmroadview()
    {
        return view('farmroadview');
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
}
