<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'restaurantID' => 'required|exists:restaurants,restaurantID',
            'userID' => 'required|exists:users,id',
            'reservation_time' => 'required|date|after:now',
            'guest_count' => 'required|integer|min:1',
        ]);

        // Restoran kapasitesini kontrol et
        $restaurant = Restaurant::findOrFail($data['restaurantID']);

        // Kapasite kontrolü
        $canReserve = Reservation::checkReservationLimit($data['restaurantID'], $data['guest_count']);
        if (!$canReserve) {
            return response()->json([
                'error' => 'Bu restoranın kapasitesi doldu! Lütfen başka bir zaman veya restoran seçin.',
            ], 400);
        }

        // Rezervasyonu oluştur
        $reservation = Reservation::create([
            'restaurantID' => $data['restaurantID'],
            'userID' => $data['userID'],
            'reservation_time' => $data['reservation_time'],
            'guest_count' => $data['guest_count'],
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Rezervasyon başarıyla oluşturuldu!',
            'reservation' => $reservation,
        ], 201);
    }
}
