<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view("reservations.reservations");
    }
    public function create(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,restaurantID',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'reservation_date' => 'required|date|after:now',
            'guest_count' => 'required|integer|min:1|max:20',
        ]);

        // 20 kişilik kısıtlama
        $totalGuests = Reservation::where('restaurant_id', $request->restaurant_id)
            ->whereDate('reservation_date', $request->reservation_date)
            ->sum('guest_count');

        if ($totalGuests + $request->guest_count > 20) {
            return back()->withErrors(['guest_count' => 'Bu tarihte toplam 20 kişilik kapasite dolmuştur.']);
        }

        // Rezervasyon oluşturma
        Reservation::create($request->all());

        return back()->with('success', 'Rezervasyon başarıyla oluşturuldu!');
    }
}
