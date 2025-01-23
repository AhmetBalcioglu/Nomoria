<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
class LoginRegisterUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Eğer kullanıcı giriş yaptıysa ve giriş veya kayıt sayfasına gitmeye çalışıyorsa
        if ($request->is('login') || $request->is('register')) {
            if (Session::has('role')) {
                return redirect('/')->with('error', 'Zaten giriş yaptınız.');
            }
        }

        return $next($request);
    }


}
