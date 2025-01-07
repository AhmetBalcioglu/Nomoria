<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory, SoftDeletes; // Soft delete özelliğini ekler

    protected $table = 'restaurants'; 
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
        'capacity'
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

}
