<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('home.home', compact('categories'));
    }

}
