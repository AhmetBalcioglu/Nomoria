<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddRestaurantController extends Controller
{
    public function index(){
        return view('addRestaurant.addRestaurant');
    }
}
