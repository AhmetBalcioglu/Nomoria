<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AddRestaurantController extends Controller
{
    public function index()
    {
        return view('addRestaurant.addRestaurant');
    }

    public function addRestaurant(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required',
            'phone' => 'required|numeric',
        ], [
            'name.required' => 'İsim alanı boş bırakılamaz.',
            'address.required' => 'Adres alanı boş bırakılamaz.',
            'phone.required' => 'Telefon alanı boş bırakılamaz.',
            'phone.numeric' => 'Telefon alanı sadece rakamlardan oluşmalıdır.',
        ]);

        $resModel = new Restaurant;
        $resModel->guid = substr(Str::uuid(), 0, 36);
        $resModel->name = $request->name;
        $resModel->address = $request->address;
        $resModel->phone = $request->phone;
        $resModel->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $resModel->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if ($resModel->save()) {
            return redirect('/addRestaurant')->with('success', 'Restoran başarıyla eklendi');
        } else {
            return redirect('/addRestaurant')->with('error', 'Restoran eklenirken bir hata oluştu')->withInput();
        }
    }
}
