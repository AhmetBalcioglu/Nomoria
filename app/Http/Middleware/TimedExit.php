<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class TimedExit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */



    protected $timedLimit = 10 * 60; // 10 dakika (saniye cinsinden)
    public function handle(Request $request, Closure $next): Response
    {
        $lastActivity = Session::get('lastactivity', time());

        // Kullanıcı 1 dakikadır işlem yapmadıysa
        if (time() - $lastActivity > $this->timedLimit) {
            Session::flush(); // Oturum verilerini temizle
            return redirect()->route('login')->with('message', '1 dakikadır işlem yapmadığınız için oturum sonlandırıldı. Lütfen tekrar giriş yapınız.');
        }

        // Son etkinlik zamanını güncelle
        Session::put('lastactivity', time());
        return $next($request);
    }
    
}


