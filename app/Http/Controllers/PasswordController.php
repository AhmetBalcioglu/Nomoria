<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PasswordsendResetCodeRequest;
use App\Http\Requests\PasswordResetPasswordRequest;



class PasswordController extends Controller
{
    //Şifre sıfırlama kodu göndermek için kullanılır.
    public function sendResetCode(PasswordsendResetCodeRequest $request)
    {
        // ------------Şifre Sıfırlama Kodu Gönderme------------
        $email = $request->input('email'); // E-posta adresini alıyoruz.
        $resetCode = random_int(100000, 999999); // Sıfırlama kodunu oluşturuyoruz.

        // Reset kodunu session'a kaydediyoruz
        Session::put('reset_code', $resetCode);
        Session::put('reset_email', $email);

        // E-postayı gönderiyoruz
        Mail::raw("Şifre sıfırlama kodunuz: $resetCode", function ($message) use ($email) {
            $message->to($email)
                ->subject('Şifre Sıfırlama Kodu');
        });

        return redirect('/newPassword');
        // ------------------------------------------------
    }


    //Şifre sıfırlama işlemi için kullanılır.
    public function resetPassword(PasswordResetPasswordRequest $request)
    {
        // ------------Şifre Sıfırlama İşlemi------------ (sessiondan yukarda gönderdiğimiz bilgileri alıyoruz.)
        $resetCode = Session::get('reset_code');
        $resetEmail = Session::get('reset_email');

        //Değerler boş ise hata mesajı ver
        if (!$resetCode || !$resetEmail) {
            return back()->withErrors(['code' => 'Sıfırlama kodu süresi dolmuş.']);
        }

        // Sıfırlama kodunu kontrol ediyoruz.
        if ($resetCode != $request->input('code')) {
            return back()->withErrors(['code' => 'Sıfırlama kodu hatalı.']);
        }

        // E-posta adresine göre kullanıcıyı buluyoruz
        $user = Users::where('email', $resetEmail)->first();
        if (!$user) {
            return back()->withErrors(['code' => 'Bu e-posta adresi sistemde kayıtlı değil.']);
        }

        // Şifreyi güncelle
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Sıfırlama kodunu ve emaili sessiondan siliyoruz.
        Session::forget('reset_code');
        Session::forget('reset_email');

        return redirect('/login')->with('success', 'Şifreniz başarıyla güncellendi.');
        // ------------------------------------------------
    }
}
