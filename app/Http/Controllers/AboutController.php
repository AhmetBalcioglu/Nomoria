<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //about bladesini dönmek için kullanılıyor.
    public function index()
    {
        return view('about.about');
    }
}
