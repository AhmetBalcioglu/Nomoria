<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
// Assuming the Restaurant model is in the App\Models namespace


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

    public function create(Request $request)
    {
        $image = time() . '.' . $request->file('image')->getClientOriginalExtension();


        $destinationPath = public_path('images');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }


        $request->file('image')->move($destinationPath, $image);

        $restaurant = new Restaurant();

        $restaurant->guid = Str::uuid();
        $restaurant->image = "/images/" . $image;
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->address = $request->address;
        $restaurant->phone = $request->phone;
        $restaurant->email = $request->email;

        $restaurant->save();

        return redirect()->route('home.home')->with('success', 'Restoran başarıyla oluşturuldu.');
    }


    public function delete(Request $request, $id){
        $restaurant = Restaurant::find($id);

        if ($restaurant) {
            $restaurant->delete();
            return redirect()->route('home.home')->with('success', 'Restoran başarıyla silindi.');
        } else {
            return redirect()->route('home.home')->with('error', 'Restoran bulunamadı.');
        }
    }

    public function update(Request $request, $id){
        $restaurant = Restaurant::find($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|integer|max:15',
            'email' => 'nullable|email|max:255',
        ]);

        $restaurant->name = $request->input('name');
        $restaurant->description = $request->input('description', $restaurant->description);
        $restaurant->address = $request->input('address', $restaurant->address);
        $restaurant->phone = $request->input('phone', $restaurant->phone);
        $restaurant->email = $request->input('email', $restaurant->email);

        if ($restaurant) {
            $restaurant->update();
            return redirect()->route('home.home')->with('success', 'Restoran başarıyla güncellendi.');
        } else {
            return redirect()->route('home.home')->with('error', 'Restoran güncellenemedi.');
        }
        
 
    }

    

}



