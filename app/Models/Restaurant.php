<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Restaurant extends Model
{
    use HasFactory, SoftDeletes; // Soft delete özelliğini ekler

    protected $table = 'restaurant';
    protected $primaryKey = 'restaurantID'; // Birincil anahtar

    // Fillable alanlar
    protected $fillable = [
        'guid',
        'image',
        'name',
        'description',
        'address',
        'phone',
        'email',
        'capacity',
        'citiesID',
        'districtID',
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

    // Tüm restoranları getir
    public static function getAllRestaurants()
    {
        return self::all();
    }
// Şehir ilişkisi
    public function cities()
{
    return $this->belongsTo(Cities::class, 'citiesID');
}

public function district()
{
    return $this->belongsTo(Districts::class, 'districtID');
}

}
