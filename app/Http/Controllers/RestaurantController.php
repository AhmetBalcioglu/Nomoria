<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Restaurant;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

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
                'radius' => 1500, // 1.5 km yarıçapı
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

    public function createPage()
    {
        return view('restaurants.restaurant');
    }

    public function create(Request $request)
    {
        // Validasyon
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
        ]);

        // Görsel yükleme
        $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $destinationPath = public_path('images');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }
        $request->file('image')->move($destinationPath, $image);

        // Restoran oluşturma
        $restaurant = new Restaurant();
        $restaurant->guid = Str::uuid();
        $restaurant->image = "/images/" . $image;
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->address = $request->address;
        $restaurant->phone = $request->phone;
        $restaurant->email = $request->email;
        $restaurant->created_at = Carbon::now();
        $restaurant->updated_at = null; // Explicitly set updated_at to null

        $restaurant->save();

        // Form-data yanıt
        return redirect()->route('home')->with('success', 'Restoran başarıyla oluşturuldu.');
    }

    public function update(Request $request, $restaurantID)
    {
        // Validasyon
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Restoran güncelleme
        $restaurant = Restaurant::find($restaurantID);
        if (empty($restaurantID)) {
            return redirect()->route('home')->with('warning', 'ID boş olamaz!');
        }

        if ($restaurant) {
            if ($request->hasFile('image')) {
                $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $destinationPath = public_path('images');
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }
                $request->file('image')->move($destinationPath, $image);
                $restaurant->image = "/images/" . $image;
            }

            $restaurant->name = $request->name;
            $restaurant->description = $request->description;
            $restaurant->address = $request->address;
            $restaurant->phone = $request->phone;
            $restaurant->email = $request->email;
            $restaurant->updated_at = Carbon::now();

            if ($restaurant->save()) {
                return redirect()->route('home')->with('success', 'Restoran başarıyla güncellendi.');
            } else {
                return redirect()->route('home')->with('error', 'Restoran güncellenemedi. Lütfen daha sonra tekrar deneyiniz.');
            }
        } else {
            return redirect()->route('home')->with('error', 'Restoran Bulunamadı');
        }
    }

    public function delete($restaurantID)
    {
        $restaurant = Restaurant::find($restaurantID);

        if (empty($restaurantID)) {
            return redirect()->route('home')->with('warning', 'ID boş olamaz!');
        }

        if ($restaurant) {
            $restaurant->deleted_at = Carbon::now();
            $restaurant->save();
            return redirect()->route('home')->with('success', 'Restoran Silindi');
        } else {
            return redirect()->route('home')->with('error', 'Restoran Bulunamadı');
        }
    }

    public function allRestaurants()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.restaurants', compact('restaurants'));
    }

}

