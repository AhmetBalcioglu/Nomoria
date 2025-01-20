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
        $restaurantID = 1; // TODO: Restoranın id'si db'den alınacak
        $restaurant = Restaurant::findOrFail($restaurantID);

        return view('restaurantManager.restaurantManager', compact('restaurant'));
    }
}
