<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantCreateRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use App\Http\Requests\RestaurantStoreRequest;
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

    public function create(RestaurantCreateRequest $request)
    {
        // Görsel yükleme
        $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $destinationPath = public_path('images/restaurantImages');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }
        $request->file('image')->move($destinationPath, $image);

        // Restoran oluşturma
        $restaurant = new Restaurant();
        $restaurant->guid = Str::uuid();
        $restaurant->image = "/images/restaurantImages/" . $image;
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->address = $request->address;
        $restaurant->phone = $request->phone;
        $restaurant->email = $request->email;
        $restaurant->capacity = $request->capacity;
        $restaurant->cuisine_type = $request->cuisineType;
        $restaurant->view_type = $request->viewType;
        $restaurant->concept = $request->concept;
        $restaurant->citiesID = $request->city;
        $restaurant->districtsID = $request->district;
        $restaurant->created_at = Carbon::now();
        $restaurant->updated_at = null;

        $restaurant->save();

        // Form-data yanıt
        return response()->json(['success' => true, 'message' => 'Restoran başarıyla oluşturuldu.']);
    }

    public function update(RestaurantUpdateRequest $request, $name)
    {
        $restaurant = Restaurant::where('name', $name)->first();

        if (!$restaurant) {
            return response()->json(['success' => false, 'message' => 'Restoran bulunamadı.'], 404);
        }

        // Eski resmi sil
        if ($request->hasFile('image')) {
            // Eski resim dosyasını sil (eğer varsa)
            if ($restaurant->image && file_exists(public_path($restaurant->image))) {
                unlink(public_path($restaurant->image));
            }

            // Yeni resmi kaydet
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
            $restaurant->image = '/images/restaurantImages/' . $imageName;
        }
        $validated = $request->validated();
        // Restoranı güncelle
        $restaurant->update([
            'name' => $validated['newName'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'capacity' => $validated['capacity'],
        ]);

        return response()->json(['success' => true, 'message' => 'Restoran başarıyla güncellendi.']);
    }


    public function delete(Request $request, $name)
    {
        // CSRF kontrolü burada yapılır
        $restaurant = Restaurant::where('name', $name)->first();

        // Eğer restoran bulunmazsa, hata mesajı döndür
        if (!$restaurant) {
            return response()->json(['success' => false, 'message' => 'Restoran Bulunamadı'], 404);
        }

        // Restoranı sil (soft delete)
        $restaurant->deleted_at = Carbon::now();
        $restaurant->save();

        // Başarılı mesajı ile yanıt dön
        return response()->json(['success' => true, 'message' => 'Restoran Silindi']);
    }

    public function search(Request $request) //Arama fonksiyonu
    {
        $query = $request->input('searchBar'); //Arama kutusundan gelen veri
        $cities = Cities::orderBy('name', 'asc')->get()->toArray(); // İlleri diziye topla
        $districts = Districts::orderBy('name', 'asc')->get()->toArray(); // İlçeleri diziye topla

        if (empty($query)) {
            return redirect()->back()->with('error', 'Arama Kutusu Boş Olamaz.');
        }

        $restaurants = Restaurant::where('name', 'like', '%' . $query . '%') //Arama sorgusu
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->get();

        if ($restaurants->isEmpty()) {
            return redirect()->back()->with('error', 'Arama Sonucu Bulunamadı.');
        }

        return view('details.details', compact(
            'restaurants',
            'query',
            'cities',
            'districts'
        )); //Arama sonucunu döndür
    }

    public function filter(Request $request)
    {

        $districtID = $request->input('district') ?? 'all';
        $cities = Cities::orderBy('name', 'asc')->get()->toArray(); // İlleri diziye topla
        $districts = Districts::orderBy('name', 'asc')->get()->toArray(); // İlçeleri diziye topla

        if ($districtID === 'all') {
            $restaurants = Restaurant::with('cities', 'districts')->get()->toArray();
        } else {
            $restaurants = Restaurant::where('districtsID', $districtID)
                ->get();
        }

        return view('details.details', compact(
            'restaurants',
            'cities',
            'districts'
        ));
    }

    /**
     * Bir restorana ait menüleri göster.
     */
    public function showMenus($restaurantID) //showMenus fonksiyonu belirli bir restorana ait menüleri göstermek için kullanılır
    {
        $restaurant = Restaurant::find($restaurantID); // Restoranı bul

        if ($restaurant) {
            $menus = $restaurant->menus; // İlişkili menüleri al
            return view('restaurant.menus', compact('restaurant', 'menus')); //menus.blade.php sayfasına restaurant ve menus değişkenlerini gönder
        } else {
            return redirect()->route('home')->with('error', 'Restoran Bulunamadı'); // Restoran bulunamadı hatası göster
        }
    }

    public function show($restaurantID)
    {
        $restaurant = Restaurant::findOrFail($restaurantID);
        return view('details.show_details', compact('restaurant'));
    }
}
