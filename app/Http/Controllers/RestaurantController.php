<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Http\Controllers\Mail\RestaurantCreatedMail;
use App\Http\Requests\RestaurantCreateRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class RestaurantController extends Controller
{
    // Restoran oluşturma sayfasına get isteği atılırsa anasayfaya yönlendirme işlemi
    public function redirectFromCreatePage()
    {
        return redirect()->route('home');
    }

    // Restoran oluşturma işlemi
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


            return response()->json(['success' => true, 'message' => 'Restoran başarıyla oluşturuldu.']); // ajax isteği atıldığı için json ile yanıt veriliyor
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }

    // Admin için restoran güncelleme işlemi
    public function update(RestaurantUpdateRequest $request, $name)
    {
        $restaurant = Restaurant::where('name', $name)->first();

        if (!$restaurant) {
            return response()->json(['success' => false, 'message' => 'Restoran bulunamadı.'], 404);
        }

        if ($request->hasFile('image')) {

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

        return response()->json(['success' => true, 'message' => 'Restoran başarıyla güncellendi.']); // ajax isteği atıldığı için json ile yanıt veriliyor
    }

    // Restoran sahibi için restoran güncelleme işlemi
    public function updateRestaurantOwner(RestaurantUpdateRequest $request, $restaurantID)
    {
        $restaurant = Restaurant::where('restaurantID', $restaurantID)->first();

        if (!$restaurant) {
            return response()->json(['success' => false, 'message' => 'Restoran bulunamadı.'], 404);
        }

        if ($request->hasFile('image')) {

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

        return response()->json(['success' => true, 'message' => 'Restoran başarıyla güncellendi.']); // ajax isteği atıldığı için json ile yanıt veriliyor
    }

    // Restoran silme işlemi
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
        return response()->json(['success' => true, 'message' => 'Restoran Silindi']); // ajax isteği atıldığı için json ile yanıt veriliyor
    }

    //Arama çubuğu işlemleri
    public function search(Request $request)
    {
        $query = $request->input('searchBar'); //Arama kutusundan gelen veri
        $cities = Cities::orderBy('name', 'asc')->get()->toArray(); // İlleri diziye topla
        $districts = Districts::orderBy('name', 'asc')->get()->toArray(); // İlçeleri diziye topla

        if (empty($query)) {
            return redirect()->back()->with('error', 'Arama Kutusu Boş Olamaz.'); //Arama kutusu boş ise hata mesajı döndür
        }

        $restaurants = Restaurant::query()
            ->where('deleted_at', null)
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('address', 'like', '%' . $query . '%');
            })
            ->get();

        if ($restaurants->isEmpty()) {
            return redirect()->back()->with('error', 'Arama Sonucu Bulunamadı.'); //Arama sonucu bulunamazsa hata mesajı döndür
        }

        return view('details.details', compact(
            'restaurants',
            'query',
            'cities',
            'districts'
        )); //Arama sonucunu döndür
    }

    // Sidebardaki filtreleme işlemleri
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


    // Dashboard için gerekli işlemler
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

        return view('dashboard.restaurantManager.restaurantManager', compact('restaurants'));
    }

    public function getMenu($id)
    {
        if (!$id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Restaurant ID eksik!'
            ], 400);
        }

        $menus = DB::table('menus')->where('restaurantID', $id)->get();

        if ($menus->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Menü bulunamadı.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $menus
        ]);
    }
}
