<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class RestaurantView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = session('userID');

        if (!$userId) {
            $userId = null; // Kullanıcı girişi yoksa null olarak ayarla
        }

        $guestID = $request->cookie('guestID');

        if (!$guestID) {

            $guestID = Str::uuid();
            Cookie::queue('guestID', $guestID, 60 * 24 * 30); // 30 gün geçerli
        }


        DB::table('viewed_restaurants')->insert([
            'userID' => $userId,
            'guestID' => $guestID,
            'restaurantID' => $request->route('restaurantID'), // Restoran ID'si dinamik olarak alınıyor
            'viewed_at' => now(),
        ]);


        return $next($request);

    }
}
