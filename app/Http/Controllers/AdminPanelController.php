<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index()
    {
        $cities = Cities::getAllCities();
        $districts = Cities::getAllDistricts();
        return view('dashboard.adminPanel.adminPanel', compact('districts', 'cities'));
    }

    public function restaurantPanel()
    {
        $cities = Cities::getAllCities();
        $districts = Cities::getAllDistricts();
        return view('dashboard.restaurantPanel.restaurantPanel', compact('districts', 'cities'));
    }
}
