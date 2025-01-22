<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantCreateRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use App\Http\Requests\RestaurantStoreRequest;
use App\Models\Favorites;
use App\Models\Menu;
use Illuminate\Support\Str;
use App\Models\Restaurant;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Mail\RestaurantCreatedMail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;



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
        return redirect()->route('home');
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
        $restaurant->userID = session('userID');
        $restaurant->image = "/images/restaurantImages/" . $image;
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->address = $request->address;
        $restaurant->phone = $request->phone;
        $restaurant->email = $request->email;
        $restaurant->capacity = $request->capacity;
        $restaurant->cuisine_type = $request->cuisineType;
        $restaurant->view_type = $request->viewType;
        $restaurant->categoryID = $request->categoryID;
        $restaurant->citiesID = $request->city;
        $restaurant->districtsID = $request->district;
        $restaurant->created_at = Carbon::now();
        $restaurant->updated_at = null;

        try {
            $restaurant->save();

            $userRole = session('role');
            $userEmail = session('email');

            if ($userRole && $userRole === 'restaurantOwner') {
                Mail::to($userEmail)->send(new RestaurantCreatedMail($restaurant));
            }


            return response()->json(['success' => true, 'message' => 'Restoran başarıyla oluşturuldu.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }
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
            $request->file('image')->move(public_path('images/restaurantImages/'), $imageName);
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

    public function updateRestaurantOwner(RestaurantUpdateRequest $request, $restaurantID)
    {
        $restaurant = Restaurant::where('restaurantID', $restaurantID)->first();

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
            $request->file('image')->move(public_path('images/restaurantImages/'), $imageName);
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
        $cities = Cities::orderBy('name', 'asc')->get()->toArray(); // İlleri diziye topla
        $districts = Districts::orderBy('name', 'asc')->get()->toArray(); // İlçeleri diziye topla
        $districtID = $request->input('district') ?? 'all'; // İlçenin id'si
        $viewType = $request->input('viewType') ?? 'all'; // Manzara türü
        $category = $request->input('category') ?? 'all'; // Konsept türü
        $couisineType = $request->input('couisineType') ?? 'all'; // Mutfak türü
        $menuType = $request->input('menuType') ?? 'all'; // Menü türü

        $restaurants = [];

        //--------------- Filtreleme işlemleri ----------------------
        if ($districtID !== 'all') {
            $restaurants += Restaurant::where('districtsID', '=', $districtID)
                ->get()->toArray();
        }

        if ($viewType !== 'all') {
            $restaurants += Restaurant::where('view_type', '=', $viewType)
                ->get()->toArray();
        }

        if ($category !== 'all') {
            $restaurants += Restaurant::where('categoryID', '=', $category)
                ->get()->toArray();
        }

        if ($couisineType !== 'all') {
            $restaurants += Restaurant::where('cuisine_type', '=', $couisineType)
                ->get()->toArray();
        }

        $restaurants = array_values(array_unique($restaurants, SORT_REGULAR));

        $query = Restaurant::query();

        if ($districtID !== 'all') {
            $query->where('districtsID', $districtID);
        }

        if ($viewType !== 'all') {
            $query->where('view_type', $viewType);
        }

        if ($category !== 'all') {
            $query->where('categoryID', $category);
        }

        if ($couisineType !== 'all') {
            $query->where('cuisine_type', $couisineType);
        }

        $query->where('deleted_at', null);

        $restaurants = $query->with([
            'cities',
            'districts',
            'favorites',
            'category' => function ($query) {
                $query->select('categoryID', 'categoryName');
            }
        ])->get()->toArray();

        //------------------------------------------------------------



        //-----Bir restoranın birden fazla menüsü olabilir onları birleştirme işlemi------
        $menus = Menu::all()->toArray();
        $groupedMenus = [];

        foreach ($menus as $menu) {
            $restaurantID = $menu['restaurantID'];
            if (!isset($groupedMenus[$restaurantID])) {
                $groupedMenus[$restaurantID] = [];
            }
            $groupedMenus[$restaurantID][] = $menu;
        }

        foreach ($restaurants as &$restaurant) {
            $restaurantID = $restaurant['restaurantID'];
            if (isset($groupedMenus[$restaurantID])) {
                $restaurant['menus'] = $groupedMenus[$restaurantID];
            } else {
                $restaurant['menus'] = [];
            }
        }
        unset($restaurant);
        if ($menuType !== 'all') {
            $restaurants = array_filter($restaurants, function ($restaurant) use ($menuType) {
                $restaurant['menus'] = array_filter($restaurant['menus'], function ($menu) use ($menuType) {
                    return $menu['menuName'] === $menuType;
                });
                return !empty($restaurant['menus']);
            });
        }
        //--------------------------------------------------------------------------------

        return view('details.details', compact(
            'restaurants',
            'cities',
            'districts',
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

        $userId = session('userID');


        if (!$userId) {
            $userId = null;
        }


        $guestID = request()->cookie('guestID'); // Çerezdeki guest_id


        if (!$guestID) {
            $guestID = Str::uuid();
            Cookie::queue('guestID', $guestID, 60 * 24 * 30);
        }


        DB::table('viewed_restaurants')->insert([
            'userID' => $userId,
            'guestID' => $guestID,
            'restaurantID' => $restaurantID, // Görüntülenen restoranın ID'si
            'viewed_at' => now(), // Görüntüleme tarihi
        ]);



        // Restoran bilgilerini al
        $restaurant = Restaurant::findOrFail($restaurantID);


        return view('details.show_details', compact('restaurant'));
    }


    public function getMyRestaurants()
    {

        $userID = session('userID');

        if (empty($userID)) {
            return view('login.login')->with("error", "Lütfen Giriş Yapınız");
        }

        $role = session('role');

        if ($role === 'admin') {
            $restaurants = Restaurant::where('deleted_at', null)->get(['restaurantID', 'userID', 'image', 'name', 'description', 'address', 'phone', 'email', 'capacity', 'cuisine_type', 'view_type', 'categoryID', 'citiesID', 'districtsID']);
        } else {
            $restaurants = Restaurant::where('userID', '=', $userID)->where('deleted_at', null)->get(['restaurantID', 'userID', 'image', 'name', 'description', 'address', 'phone', 'email', 'capacity', 'cuisine_type', 'view_type', 'categoryID', 'citiesID', 'districtsID']);
        }

        return view('restaurantManager.restaurantManager', compact('restaurants'));
    }

   
}
