<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {

        $location = $request->input('location', '41.0082,28.9784'); // İstanbul'un koordinatları varsayılan
        $type = $request->input('type', 'cafe'); // Varsayılan olarak "cafe"

        // Google Places API'ye istek yapmak için Client nesnesi
        $client = new Client();


        $params = [
            'query' => [
                'location' => $location,
                'radius' => 1500,  // 1.5 km yarıçapı
                'type' => $type,
                'key' => env('GOOGLE_PLACES_API_KEY'),
            ]
        ];


        try {
            $response = $client->get('https://maps.googleapis.com/maps/api/place/nearbysearch/json', $params);
            $restaurants = json_decode($response->getBody()->getContents(), true)['results'];
        } catch (\Exception $e) {
            return view('error', ['message' => 'API İsteği Hatası: ' . $e->getMessage()]);

        }

        return view('layouts.sections.restaurants.index', compact('restaurants'));
    }
    //test
    public function show($id)
{
    $restaurant = Restaurant::with('menus')->findOrFail($id); // İlişkili menüleri yükler

    return view('restaurant.show', compact('restaurant'));
}

}
