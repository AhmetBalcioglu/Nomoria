<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function discount()
    {
        return view("discount.discount");
    }
}



