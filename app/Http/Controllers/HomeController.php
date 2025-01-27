<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Favorites;


class HomeController extends Controller
{
    //Home bladesini dönmek için ve tüm kategorileri almak için kullanılır.
    public function index()
    {
        // Tüm kategorileri al
        $categories = Categories::all();

        // Kullanıcının ID'sini session'dan al
        $userID = session('userID');



        // Kullanıcının favori kategorilerini al
        $favoritedCategories = Favorites::where('userID', $userID)
            ->whereNotNull('categoryID') // categoryID'ye sahip favoriler
            ->pluck('categoryID') // Sadece categoryID'leri al
            ->toArray();

        // Verileri tek bir view'e gönder
        return view('home.home', compact('categories', 'favoritedCategories'));
    }
}
