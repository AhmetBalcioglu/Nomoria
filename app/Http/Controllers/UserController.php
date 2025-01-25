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

    /*profil hesabı güncelleme apisi */

    public function update(Request $request)
    {
        $user = Users::find(session('userID'));
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if ($user->save()) {
            return response()->json(['success' => 'Kullanıcı bilgileri güncellendi']);
        } else {
            return response()->json(['error' => 'Güncelleme başarısız!'], 400);
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
