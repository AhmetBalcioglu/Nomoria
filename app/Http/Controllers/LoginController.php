<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class LoginController extends Controller
{   
    //Login bladesini dönmek için kullanılır.
    public function index()
    {
        return view('login.login');
    }

    //Register bladesini dönmek için kullanılır.
    public function register()
    {
        return view('register.register');
    }

    //forgotPassword bladesini dönmek için kullanılır.
    public function forgotPassword()
    {
        return view('forgotPassword.forgotPassword');
    }

    //newPassword bladesini dönmek için kullanılır.
    public function newPassword()
    {
        return view('newPassword.newPassword');
    }

    //Tüm restoranları alıp profile bladesini dönmek için kullanılır.
    public function profile()
    {
        $restaurants = Restaurant::all();
        return view('profile.profile', compact('restaurants'));
    }
}
