<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class CheckGuestId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Eğer session'da 'user_id' yoksa ve guest_id çerezi yoksa:
        if (!session('user_id') && !$request->cookie('guest_id')) {
            // Benzersiz bir UUID oluştur
            $guestId = Str::uuid();
            // 30 gün geçerli bir guest_id çerezi oluştur
            Cookie::queue('guest_id', $guestId, 60 * 24 * 30);
        }

        // Bir sonraki middleware'e ya da route'a geçiş
        return $next($request);
    }
}

