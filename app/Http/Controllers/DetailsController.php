<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Favorites;
use App\Models\DetailImage;

class DetailsController extends Controller
{
    public function index()
    {
        // Kullanıcı çıkış yaptıysa favori bilgilerini sıfırla
        $restaurants = Restaurant::with(['cities', 'districts', 'favorites','detail_image'])
            ->where('deleted_at', '=', null)
            ->orderBy('name', 'asc')
            ->get()
            ->toArray();

        if (!session()->has('userID')) {
            foreach ($restaurants as &$restaurant) {
                $restaurant['favorites'] = null;
            }
        }

        $detailImage = DetailImage::all()->toArray();
        $cities = Cities::orderBy('name', 'asc')->get()->toArray();
        $districts = Districts::orderBy('name', 'asc')->get()->toArray();

        return view("details.details", compact(
            'restaurants',
            'cities',
            'districts',
        ));
    }

}
