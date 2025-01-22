<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class historyRezervationsController extends Controller
{
    public function index()
    {
        return view('historyRezervations.historyRezervations');
    }
}
