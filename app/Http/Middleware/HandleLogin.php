<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class HandleLogin
{
    public function handle(Request $request, Closure $next)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $email = $request->input('email');
            $password = $request->input('password');

            $user = Users::where('email', $email)->first();

            if (!$user || !Hash::check($password, $user->password)) {
                return redirect('/login')->with('error', 'Email veya Şifre hatalı!');
            }

            $userRole = $user->role;
            Session::put('userID', $user->userID);
            Session::put('role', $userRole);
            Session::put('name', $user->name);
            Session::put('surname', $user->surname);
            return redirect('/')->with('success', 'Giriş Başarılı!');
        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }
}
