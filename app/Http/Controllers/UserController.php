<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Mail\VerificationCodeMail;


class UserController extends Controller
{
    public function create(UserCreateRequest $request)
    {
        $user = new Users();

        $user->guid = substr(Str::uuid(), 0, 36);
        $user->name = mb_convert_case($request->input('name'), MB_CASE_TITLE, 'UTF-8');
        $user->surname = mb_strtoupper($request->input('surname'), 'UTF-8');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->role = $request->input('role');

        if ($user->save()) {
            return response()->json(['success' => 'Kullanıcı oluşturuldu']);
        } else {
            return response()->json(['error' => 'Kullanıcı oluşturulamadı!'], 400);
        }
    }

    public function sendVerificationCode(Request $request)
    {
        // Yeni e-posta adresi
        $newEmail = $request->input('newEmail');

        // Yeni e-posta adresi kontrolü (boş olmamalı)
        if (!$newEmail) {
            return response()->json(['error' => 'Lütfen yeni e-posta adresini girin.'], 400);
        }

        // Doğrulama kodu oluşturuluyor
        $verificationCode = Str::random(6); // 6 haneli rastgele kod

        // Kodun oturumda saklanması
        session(['verificationCode' => $verificationCode, 'newEmail' => $newEmail]);

        // E-posta gönderimi
        Mail::to($newEmail)->send(new VerificationCodeMail($verificationCode));

        return response()->json(['success' => 'Doğrulama kodu yeni e-posta adresinize gönderildi.']);
    }

    public function update(Request $request, $userID)
    {
        // Kullanıcıyı $userID ile arıyoruz
        $user = Users::find($userID);

        // Kullanıcı bulunamazsa hata döndür
        if (!$user) {
            return response()->json(['error' => 'Kullanıcı bulunamadı.'], 404);
        }

        // Kullanıcı var ise güncelleme işlemleri devam eder...
        if ($request->has('newEmail') && $request->input('newEmail') !== $user->email) {
            $user->email = $request->input('newEmail');
        }

        if ($request->has('newPassword') && $request->input('newPassword') !== '') {
            $newPassword = $request->input('newPassword');
            $user->password = Hash::make($newPassword);
        }

        $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if ($user->save()) {
            session(['email' => $user->email]); // email session'ı güncellendi.
            if ($request->has('newPassword')) {
                session(['password' => $user->password]); // password session'ı güncellendi.
            }

            return response()->json(['success' => 'Kullanıcı bilgileri başarıyla güncellendi.']);
        } else {
            return response()->json(['error' => 'Güncelleme işlemi başarısız oldu.'], 400);
        }
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
