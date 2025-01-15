<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Favorites;

class DetailsController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with(['cities', 'districts','favorites'])->get()->toArray();
        $cities = Cities::orderBy('name', 'asc')->get()->toArray();
        $districts = Districts::orderBy('name', 'asc')->get()->toArray();

        return view("details.details", compact(
            'restaurants',
            'cities',
            'districts',
        ));
    }
}
