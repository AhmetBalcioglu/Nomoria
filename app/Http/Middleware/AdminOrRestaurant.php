<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminOrRestaurant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('role')) {
            return redirect('/login')->with('error', 'Lütfen önce giriş yapın.');
        }

        $userRole = Session::get('role');
        if (in_array(($userRole), ['admin', 'restaurantOwner'])) {
            return $next($request); // Erişim izni verildi
        }

        abort(403, 'Bu sayfaya erişim izniniz yok.');
    }
}
