<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class DetailsController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::getAllRestaurants()->toArray();
        return view("details.details", compact('restaurants'));
    }
}
