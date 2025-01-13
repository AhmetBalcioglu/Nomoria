<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationCreateRequest;

class ReservationController extends Controller
{
    public function index()
    {
        return view("reservations.reservations");
    }
    public function create(ReservationCreateRequest $request)
    {
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
