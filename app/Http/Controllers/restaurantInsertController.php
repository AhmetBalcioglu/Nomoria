<?php

namespace App\Http\Controllers;

use App\Models\Cities;

class restaurantInsertController extends Controller
{
    public function index()
    {
        $cities = Cities::getAllCities();
        $districts = Cities::getAllDistricts();
        return view('dashboard.restaurantInsert.restaurantInsert', compact(
            'districts',
            'cities',
        ));
    }
}
