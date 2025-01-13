<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create(UserCreateRequest $request)
    {
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
