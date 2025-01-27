<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimedExit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */


    // 10 dakika sonra oturumu otomatik olarak sonlandıran middleware
    protected $timedLimit = 10 * 60; // 10 dakika (saniye cinsinden)

    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('role')) {
            $lastActivity = session()->get('lastactivity', time());

            // Kullanıcı 10 dakikadır işlem yapmadıysa
            if (time() - $lastActivity > $this->timedLimit) {
                session()->flush(); // Oturum verilerini temizle
                return redirect()->route('login')->with('message', '1 dakikadır işlem yapmadığınız için oturum sonlandırıldı. Lütfen tekrar giriş yapınız.');
            }

            // Son etkinlik zamanını güncelle
            session()->put('lastactivity', time());
        }

        return $next($request);
    }
}
