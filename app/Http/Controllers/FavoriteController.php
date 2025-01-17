<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Favorites;
use Illuminate\Support\Facades\DB;



class FavoriteController extends Controller
{
    public function index()
    {
        return view('favorites.favorites');
    }

    public function getFavorites()
    {
        $cities = Cities::orderBy('name', 'asc')->get()->toArray(); // İlleri diziye topla
        $districts = Districts::orderBy('name', 'asc')->get()->toArray(); // İlçeleri diziye topla
        $restaurants = Restaurant::with('cities', 'districts')->get()->toArray(); // Restoranları diziye topla
        // Kullanıcının ID'sini session'dan al
        $userID = session('userID');

        // Eğer session'dan kullanıcı ID'si alınamazsa hata ver
        if (!$userID) {
            return redirect()->route('login')->with('error', 'Lütfen giriş yapınız.');
        }

        // Favorilerdeki restoranların bilgilerini al
        $favorities = Favorites::with('restaurant:restaurantID,image,name,description,citiesID,cities,districts')
            ->with('restaurant.districts')
            ->whereNotNull('restaurantID')
            ->with('restaurant.districts.city')
            ->where('userID', $userID)
            ->get();

        return view('favorites.favorites', compact(
            'favorities',
            'cities',
            'districts',
            'restaurants'
        ));
    }



    public function toggleFavoriteCategory($categoryID)
    {
        // Kullanıcının oturumda olup olmadığını kontrol et
        $userID = session('userID'); // Session'dan kullanıcı ID'sini al

        if (!$userID) {
            // Kullanıcı oturumu yoksa hata döndür
            return response()->json([
                'success' => false,
                'message' => 'Kullanıcı oturumu açmamış.',
            ]);
        }

        // Kullanıcının bu kategoriye dair favori kaydı var mı kontrol et
        $favorite = Favorites::where('categoryID', $categoryID)
            ->where('userID', $userID)
            ->first();
        if ($favorite) {
            // Eğer favori kaydı varsa sil
            Favorites::where('categoryID', $categoryID)
                ->where('userID', $userID)
                ->delete();
            $added = false;
            $message = 'Favorilerinizden kaldırıldı.';
        } else {
            // Eğer favori kaydı yoksa yeni bir kayıt ekle
            Favorites::create([
                'categoryID' => $categoryID,
                'userID' => $userID,
            ]);
            $added = true;
            $message = 'Favorilerinize eklendi.';
        }

        // İşlem sonucunu döndür
        return response()->json([
            'success' => true,
            'added' => $added,
            'message' => $message,
        ]);
    }

    public function toggleFavorite($restaurantID)
    {
        // Kullanıcının oturumda olup olmadığını kontrol et
        $userID = session('userID'); // Session'dan kullanıcı ID'sini al

        if (!$userID) {
            // Kullanıcı oturumu yoksa hata döndür
            return response()->json([
                'success' => false,
                'message' => 'Kullanıcı oturumu açmamış.',
            ]);
        }

        // Kullanıcının bu restorana dair favori kaydı var mı kontrol et
        $favorite = Favorites::where('restaurantID', $restaurantID)
            ->where('userID', $userID)
            ->first();

        if ($favorite) {
            // Eğer favori kaydı varsa sil
            Favorites::where('restaurantID', $restaurantID)
                ->where('userID', $userID)
                ->delete();
            $added = false;
            $message = 'Favorilerinizden kaldırıldı.';
        } else {
            // Eğer favori kaydı yoksa yeni bir kayıt ekle
            Favorites::create([
                'restaurantID' => $restaurantID,
                'userID' => $userID,
            ]);
            $added = true;
            $message = 'Favorilerinize eklendi.';
        }

        // İşlem sonucunu döndür
        return response()->json([
            'success' => true,
            'added' => $added,
            'message' => $message,
        ]);
    }
}
