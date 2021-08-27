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
}
