<?php

namespace App\Http\Controllers;

use App\Models\DiscountRestaurants;
use App\Models\Restaurant;

class DiscountController extends Controller
{
    //Kampanyalı restoranları döndürmek için kullanılır
    public function discount()
    {
        $userID = session('userID'); // Oturumdaki kullanıcı ID'sini al

        // discount_restaurants, restaurant, cities ve districts tablolarını birlikte getirir.
        $discountRestaurants = DiscountRestaurants::with(['restaurant.cities', 'restaurant.districts'])
            ->with([
                'restaurant' => function ($query) use ($userID) {
                    $query->with([
                        'favorites' => function ($q) use ($userID) {
                            $q->where('userID', $userID);
                        }
                    ]);
                }
            ])
            ->get();

        return view("discount.discount", compact('discountRestaurants'));
    }

    // İsmini girdiğim restoranı kampanyalı restoranlara ekleme fonksiyonu.
    public function create($name)
    {
        // Girdiğim isime sahip restoranı bul.
        $restaurant = Restaurant::where('name', $name)->with(['districts', 'cities'])->first();

        if ($restaurant) {
            // Restoran zaten kampanyalı mı diye kontrol et
            $existingDiscount = DiscountRestaurants::where('restaurantID', $restaurant->restaurantID)->first();

            if ($existingDiscount) {
                return response()->json(['message' => 'Restoran zaten kampanyalı!'], 400);
            }

            // Restoranı kampanyalı restoranlara ekle
            $isCreated = DiscountRestaurants::create(['restaurantID' => $restaurant->restaurantID]);

            if ($isCreated) {
                return response()->json(['message' => 'Kampanyalı restoranlara eklendi'], 200);
            } else {
                return response()->json(['message' => 'Kampanyalı restoranlara eklenemedi'], 500);
            }
        } else {
            return response()->json(['message' => 'Restoran Bulunamadı!'], 404);
        }
    }

    // İsmini girdiğim restoranı kampanyalı restoranlardan silme fonksiyonu
    public function delete($name)
    {
        // Girdiğim isime sahip restoranı bul.
        $restaurant = Restaurant::where('name', $name)->first();

        if ($restaurant) {

            // Restoranı kampanyalı restoranlardan sil
            $deleted = DiscountRestaurants::where('restaurantID', $restaurant->restaurantID)->delete();

            if ($deleted) {
                return response()->json(['message' => 'Kampanyalı restorandan silindi'], 200);
            } else {
                return response()->json(['message' => 'Silinemedi'], 500);
            }
        } else {
            return response()->json(['message' => 'Restoran Bulunamadı!'], 404);
        }
    }
}
