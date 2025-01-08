<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Factory kullanmıyoruz, HasFactory trait'i eklemiyoruz.

    protected $table = 'menus'; // Tablo ismi
    protected $primaryKey = 'menuID'; // Birincil anahtar
    public $timestamps = true; // Zaman damgası (created_at, updated_at)

    protected $fillable = [
        'restaurantID',
        'name',
        'description',
        'price',
    ];

    // İlişkiler
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurantID', 'restaurantID');
    }
}
