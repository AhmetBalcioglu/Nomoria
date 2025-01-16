<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HandleLogout
{
    public function handle()
    {
        Session::flush();
        return redirect('/')->with('success', 'Çıkış Başarılı!');
    }
}
