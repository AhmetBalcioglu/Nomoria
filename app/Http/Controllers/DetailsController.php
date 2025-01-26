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
    // Restoranların detaylı fotoğraflarını döndürmek için kullanılır.
    public function index()
    {
        // restaurant, cities, districts, favorites, detail_image tablolarını birlikte getir
        $restaurants = Restaurant::with(['cities', 'districts', 'favorites','detail_image'])
            ->where('deleted_at', '=', null)
            ->orderBy('name', 'asc')
            ->get()
            ->toArray();

        // Kullanıcının favori restoranlarını al
        if (!session()->has('userID')) {
            foreach ($restaurants as &$restaurant) {
                $restaurant['favorites'] = null;
            }
        }

        // detail_image, cities ve districts tablolarını ayrı ayrı değerlere atanır.
        $detailImage = DetailImage::all()->toArray();
        $cities = Cities::orderBy('name', 'asc')->get()->toArray(); // name sütununu göre sıralanmış geliyor.
        $districts = Districts::orderBy('name', 'asc')->get()->toArray(); // name sütununu göre sıralanmış geliyor.

        return view("details.details", compact(
            'restaurants',
            'cities',
            'districts',
        ));
    }

}
