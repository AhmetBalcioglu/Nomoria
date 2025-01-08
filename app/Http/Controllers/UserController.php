<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ], [
            'name.required' => "Adınızı girmeniz gerekiyor",
            'name.alpha' => "Adınızı sadece harflerden oluşacak şekilde girebilirsiniz",
            'surname.required' => "Soyadınızı girmeniz gerekiyor",
            'surname.alpha' => "Soyadınızı sadece harflerden oluşacak şekilde girebilirsiniz",
            'email.required' => "Email adresinizi girmeniz gerekiyor",
            'email.email' => "Email adresinizin geçerli bir adres olması gerekiyor",
            'email.unique' => "Girdiğiniz email adresi zaten sistemde kayıtlı",
            'password.required' => "Şifrenizi girmeniz gerekiyor",
            'password.min' => "Şifreniz en az 8 karakterden oluşacak şekilde girebilirsiniz",
        ]);

        $user = new Users();

        $user->guid = substr(Str::uuid(), 0, 36);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if ($user->save()) {
            return redirect('/login')->with('success', 'Kullanıcı oluşturuldu');
        } else {
            return redirect('/register')->with('error', 'Kullanıcı oluşturulamadı!');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = Users::where('email', $email)->first();
        $allUsers = Users::all()->toArray();
        $userRole = $user->role;

        if ($user && Hash::check($password, $user->password)) {
            Session::put('role', $userRole);
            Session::put('name', $user->name);
            Session::put('surname', $user->surname);
            return redirect('/')->with('success', 'Giriş Başarılı!');
        } else {
            return redirect('/login')->with('error', 'Email veya Şifre hatalı!')->withInput();
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('success', 'Çıkış Başarılı!');
    }

    public function forgotPassword(Request $request)
    {
        $email = Users::where('email', $request->input('email'))->first();

        if ($email) {
            return redirect('/newPassword')->with('success', 'Sıfırlama kodu e-posta adresinize gonderildi');
        } else {
            return redirect('/forgotPassword')->with('error', 'E-posta adresiniz sistemde bulunamadı')->withInput();
        }
    }
}
