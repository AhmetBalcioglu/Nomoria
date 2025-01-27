<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    //about bladesini dönmek için kullanılıyor.
    public function index()
    {
        return view('about.about');
    }
}
