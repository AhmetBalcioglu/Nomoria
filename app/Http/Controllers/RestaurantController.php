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
            'capacity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'cuisineType' => 'nullable|string|max:255',
            'viewType' => 'nullable|string|max:255',
            'concept' => 'nullable|string|max:255'
        ]);

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
        $restaurant->citiesID  = $request->city;
        $restaurant->districtsID  = $request->district;
        $restaurant->created_at = Carbon::now();
        $restaurant->updated_at = null;

        $restaurant->save();

        // Form-data yanıt
        return response()->json(['success' => true, 'message' => 'Restoran başarıyla oluşturuldu.']);
    }

    public function update(Request $request, $name)
    {
        $validated = $request->validate([
            'newName' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'capacity' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

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
            $restaurant->image = '/images/' . $imageName;
        }

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

        return view('details.details', compact('restaurants', 'query')); //Arama sonucunu döndür
    }

    // Restoran ekleme sayfasını göster
    public function store(Request $request) ////store fonksiyonu veritabanına veri eklemek için kullanılır
    {
        $validated = $request->validate([ //Gelen verilerin doğrulanması
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'citiesID' => 'required|exists:cities,citiesID',
            'districtID' => 'required|exists:districts,districtID',
        ]);

        Restaurant::create($validated); //Restaurant modeline verileri ekle

        return redirect()->back()->with('success', 'Restoran başarıyla eklendi.');
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
}
