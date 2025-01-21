<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationCreateRequest;
use App\Models\Restaurant;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('restaurant.cities', 'restaurant.districts')->get()->toArray();
        return view("reservations.reservations", compact('reservations'));
    }
    public function makeReservation()
    {
        return view("reservations.makeReservation");
    }
    public function create(ReservationCreateRequest $request)
    {
        $reservation = new Reservation();

        $restaurant = Restaurant::find($request->input('restaurantID'));
        $restaurantCapacity = $restaurant->capacity;

        if ($request->input('guestCount') > $restaurantCapacity) {
            return response()->json(['success' => false, 'message' => 'Restoran kapasitesi dolmuştur.',]);
        }

        if ($request->date < Carbon::now()->format('Y-m-d')) {
            return response()->json(['success' => false, 'message' => 'Lütfen geçerli bir tarih giriniz'], 400);
        }


        $reservation->restaurantID = $request->input('restaurantID');
        $reservation->userID = $request->input('userID');
        $reservation->reservation_time = $request->input('date');
        $reservation->guest_count = $request->input('guestCount');
        $reservation->created_at = Carbon::now();

        try {
            $reservation->save();

            //TODO: Rezervasyon yaptıktan sonra maile mesaj gönder

            return response()->json(['success' => true, 'message' => 'Rezervasyon başarıyla oluşturuldu.',]);
        } catch (\Throwable $errorMessage) {
            return response()->json(['success' => false, 'message' => $errorMessage->getMessage(),]);
        }
    }
}
