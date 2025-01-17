<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Favorites;


class HomeController extends Controller
{
    public function index()
    {
        // Tüm kategorileri al
        $categories = Categories::all();

        // Kullanıcının ID'sini session'dan al
        $userID = session('userID');

        // Eğer session'dan kullanıcı ID'si alınamazsa hata ver
        if (!$userID) {
            return redirect()->route('login')->with('error', 'Lütfen giriş yapınız.');
        }

        // Kullanıcının favori kategorilerini al
        $favoritedCategories = Favorites::where('userID', $userID)
            ->whereNotNull('categoryID') // categoryID'ye sahip favoriler
            ->pluck('categoryID') // Sadece categoryID'leri al
            ->toArray();

        // Verileri tek bir view'e gönder
        return view('home.home', compact('categories', 'favoritedCategories'));
    }

}
