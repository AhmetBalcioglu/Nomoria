<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class DetailsController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with(['cities', 'districts'])->get()->toArray();
        $cities = Cities::orderBy('name', 'asc')->get()->toArray();
        $districts = Districts::orderBy('name', 'asc')->get()->toArray();

        return view("details.details", compact(
            'restaurants',
            'cities',
            'districts'
        ));
    }



}
