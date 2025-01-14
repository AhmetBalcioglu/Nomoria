<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Favorites;


class FavoriteController extends Controller
{
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