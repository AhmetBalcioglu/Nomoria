<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class DetailsController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::getAllRestaurants()->toArray();
        $cityName = Cities::getCityName($restaurants[0]['citiesID']);
        $districtName = Cities::getDistrictName($restaurants[0]['districtsID']);
        return view("details.details", compact(
            'restaurants',
            'cityName',
            'districtName'
        ));
    }
}
