<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class historyRezervationsController extends Controller
{

    // historyRezervations bladesini dönmek için kullanılır.
    public function index()
    {
        return view('historyRezervations.historyRezervations');
    }
}
