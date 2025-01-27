<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Mail\ReservationCreatedMail;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Http\Requests\ReservationCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class ReservationController extends Controller
{
    // Yapılan rezervasyonları gösterme işlemi
    public function index()
    {
        $reservations = Reservation::with('restaurant', 'restaurant.cities', 'restaurant.districts')->get()->toArray();
        $futureReservations = [];
        foreach ($reservations as $reservation) {
            if ($reservation['reservation_time'] >= Carbon::now()->format('Y-m-d')) {
                array_push($futureReservations, $reservation);
            }
        }
        return view("reservations.reservations", compact('futureReservations'));
    }

    // Geçmiş rezervasyonları gösterme işlemi
    public function historyRezervations()
    {
        $reservations = Reservation::with('restaurant', 'restaurant.cities', 'restaurant.districts')->get()->toArray();
        $allReservations = Reservation::with('restaurant', 'restaurant.cities', 'restaurant.districts')->withTrashed()->get()->toArray();

        $pastReservations = [];
        $cancelledReservations = [];

        foreach ($reservations as $reservation) {
            if ($reservation['reservation_time'] < Carbon::now()->format('Y-m-d')) {
                array_push($pastReservations, $reservation);
            }
        }

        foreach ($allReservations as $reservation) {
            if ($reservation['deleted_at'] != null) {
                array_push($cancelledReservations, $reservation);
            }
        }

        return view("historyRezervations.historyRezervations", compact('pastReservations', 'cancelledReservations'));
    }

    // Rezervasyon oluşturma sayfasına yönlendirme işlemi
    public function makeReservation()
    {
        $restaurants = Restaurant::all()->toArray();
        return view("reservations.makeReservation", compact('restaurants'));
    }

    // Rezervasyon oluşturma işlemi
    public function create(ReservationCreateRequest $request)
    {
        //-----------------------Rezervasyon oluşturma işlemi------------------------
        $reservation = new Reservation();

        $restaurant = Restaurant::where('restaurantID', $request->input('restaurantID'))->first();
        if (!$restaurant) {
            return response()->json(['success' => false, 'message' => 'Restoran bulunamadı.']);
        }

        $restaurantCapacity = $restaurant->capacity;

        if ($request->input('guestCount') > $restaurantCapacity) {
            return response()->json(['success' => false, 'message' => 'Restoran kapasitesi dolmuştur.']);
        }

        if ($request->date < Carbon::now()->format('Y-m-d') || $request->date > Carbon::createFromDate(2099, 12, 31)->format('Y-m-d')) {
            return response()->json(['success' => false, 'message' => 'Lütfen geçerli bir tarih giriniz'], 400);
        }

        $reservation->restaurantID = $request->input('restaurantID');
        $reservation->userID = session('userID');
        $reservation->reservation_time = $request->input('date');
        $reservation->guest_count = $request->input('guestCount');
        $reservation->created_at = Carbon::now();
        $reservation->updated_at = null;

        try {
            $userName = session('name');
            $userEmail = session('email');
            $reservation->save();
            Mail::to($userEmail)->send(new ReservationCreatedMail($reservation, $userName)); // Rezervasyon bilgileri kullanıcıya e-posta ile gönderiliyor

            return response()->json(['success' => true, 'message' => 'Rezervasyon başarıyla oluşturuldu.']); // ajax isteği atıldığı için json ile yanıt veriliyor
        } catch (\Throwable $errorMessage) {
            return response()->json(['success' => false, 'message' => $errorMessage->getMessage()]);
        }
        //--------------------------------------------------------------------------
    }

    // Rezervasyon silme işlemi
    public function delete($id)
    {
        $reservation = Reservation::find($id);


        if (!$reservation) {
            return response()->json(['success' => false, 'message' => 'Rezervasyon bulunamadı.'], 404);
        }

        try {
            $reservation->delete();
            return response()->json(['success' => true, 'message' => 'Rezervasyon başarıyla silindi.']); // ajax isteği atıldığı için json ile yanıt veriliyor
        } catch (\Throwable $errorMessage) {
            return response()->json(['success' => false, 'message' => $errorMessage->getMessage()]);
        }
    }

    // Rezervasyon güncelleme işlemi
    public function update(Request $request, $id)
    {
        request()->validate([
            'newReservationDate' => 'required|date_format:Y-m-d',
            'newGuestCount' => 'required|integer',
        ], [
            'newReservationDate.required' => 'Rezervasyon tarihi zorunludur.',
            'newReservationDate.date_format' => 'Lütfen geçerli bir tarih giriniz.',
            'newGuestCount.required' => 'Misafir sayısı zorunludur.',
            'newGuestCount.integer' => 'Lütfen geçerli bir misafir sayısı giriniz.',
        ]);
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['success' => false, 'message' => 'Rezervasyon bulunamadı.'], 404);
        }

        $reservation->reservation_time = $request->input('newReservationDate');
        $reservation->guest_count = $request->input('newGuestCount');
        $reservation->updated_at = Carbon::now();

        try {
            $reservation->save();
            return response()->json(['success' => true, 'message' => 'Rezervasyon başarıyla güncellendi.']); // ajax isteği atıldığı için json ile yanıt veriliyor
        } catch (\Throwable $errorMessage) {
            return response()->json(['success' => false, 'message' => $errorMessage->getMessage()]);
        }
    }
}
