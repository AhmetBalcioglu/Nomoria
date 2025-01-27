<?php

namespace App\Http\Controllers;

use App\Models\Cities;

class AdminPanelController extends Controller
{
    //Cities ve Districts modelinden verileri alınıp adminPanel sayfasına gonderilir ve adminPanel döndürülür.
    public function index()
    {
        $cities = Cities::getAllCities();
        $districts = Cities::getAllDistricts();
        return view('dashboard.adminPanel.adminPanel', compact('districts', 'cities'));
    }

    //Cities ve Districts modelinden verileri alınıp restaurantPanel sayfasına gonderilir ve restaurantPanel döndürülür.
    public function restaurantPanel()
    {
        $cities = Cities::getAllCities();
        $districts = Cities::getAllDistricts();
        return view('dashboard.restaurantPanel.restaurantPanel', compact('districts', 'cities'));
    }
}
