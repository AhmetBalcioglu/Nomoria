<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function register()
    {
        return view('register.register');
    }

    public function forgotPassword()
    {
        return view('forgotPassword.forgotPassword');
    }

    public function newPassword()
    {
        return view('newPassword.newPassword');
    }

    public function profile()
    {
        $restaurants = Restaurant::all();
        return view('profile.profile', compact('restaurants'));
    }
}
