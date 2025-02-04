<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{

    protected $table = 'restaurant';
    protected $primaryKey = 'restaurantID'; // Birincil anahtar

    // Fillable alanlar
    protected $fillable = [
        'guid',
        'image',
        'detail_image_id',
        'name',
        'description',
        'address',
        'phone',
        'email',
        'capacity',
        'citiesID',
        'districtsID',
        'cuisine_type', // Dünya mutfağı
        'view_type', // Mekan türü
        'categoryID', // Konsept
        'meat_dishes', // Et yemekleri
        'fish_species', // Balık türleri
        'fast_food', // Fast food
        'vegan', // Vejeteryan
        'alcoholic_places', // Alkol servisi
        'rating', // Puanlama
    ];

    // Yorumlar (Reviews) ilişkisi
    public function reviews()
    {
        return $this->hasMany(Review::class, 'restaurantID', 'restaurantID');
    }

    // Rezervasyonlar (Reservations) ilişkisi
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'restaurantID', 'restaurantID');
    }

    // Kapasiteyi almak için fonksiyon
    public function getCapacity()
    {
        return $this->capacity;  // Restoran kapasitesini döndürür
    }

    // Bir restoranın birden fazla menüsü olabilir (menüler ile ilişki)
    public function menus()
    {
        return $this->hasMany(Menu::class, 'restaurantID', 'restaurantID');
    }

    public function detail_image()
    {
        return $this->belongsTo(DetailImage::class, 'detail_image_id', 'detail_image_id');
    }


    // Tüm restoranları getir
    public static function getAllRestaurants()
    {
        return self::all();
    }

    public function users()
    {
        return $this->belongsTo(Users::class, 'userID', 'userID');
    }

    // Şehir ilişkisi
    public function cities()
    {
        return $this->belongsTo(Cities::class, 'citiesID', 'citiesID');
    }

    public function districts()
    {
        return $this->belongsTo(Districts::class, 'districtsID', 'districtsID');
    }

    public function favorites()
    {
        return $this->belongsTo(Favorites::class, 'restaurantID', 'restaurantID');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'categoryID', 'categoryID');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'restaurantID');
    }

    public function categories()
    {
        return $this->hasMany(Categories::class, 'categoryID');
    }

    /**

     * Her kaydetme işlemi sırasında `capacity` alanını kontrol eder.
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($restaurant) {
            if ($restaurant->capacity < 0) {
                throw new \InvalidArgumentException("Capacity cannot be negative.");
            }
        });
    }

    /**
     * : Capacity'yi her ayarlama sırasında kontrol eder.
     */
    public function setCapacityAttribute($value)
    {
        if ($value < 0) {
            throw new \InvalidArgumentException("Capacity cannot be negative.");
        }

        $this->attributes['capacity'] = $value;
    }



    public function views()
    {
        return $this->hasMany(ViewedRestaurant::class, 'restaurantID', 'restaurantID');
    }
}
