<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus'; // Tablo ismi
    protected $primaryKey = 'menuID'; // Birincil anahtar


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
