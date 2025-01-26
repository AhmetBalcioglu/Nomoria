<?php

namespace App\Http\Controllers;

use App\Models\DiscountRestaurants;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function discount()
    {
        $userID = session('userID'); // Oturumdaki kullanıcı ID'sini al

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


    public function create($name)
    {
        $restaurant = Restaurant::where('name', $name)->with(['districts', 'cities'])->first();

        if ($restaurant) {
            $existingDiscount = DiscountRestaurants::where('restaurantID', $restaurant->restaurantID)->first();

            if ($existingDiscount) {
                return response()->json(['message' => 'Restoran zaten kampanyalı!'], 400);
            }

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

    public function delete($name)
    {
        $restaurant = Restaurant::where('name', $name)->first();

        if ($restaurant) {
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



