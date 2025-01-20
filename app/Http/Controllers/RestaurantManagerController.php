<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Districts;
use App\Models\Restaurant;


class RestaurantManagerController extends Controller
{
    public function index()
    {

        $cities = Cities::orderBy('name', 'asc')->get()->toArray(); // İlleri diziye topla
        $districts = Districts::orderBy('name', 'asc')->get()->toArray(); // İlçeleri diziye topla
        $restaurant = Restaurant::orderBy('name', 'asc')->get()->toArray(); // Restaurantları diziye topla
        return view('restaurantManager.restaurantManager', compact('cities', 'districts', 'restaurant'));
    }


}
