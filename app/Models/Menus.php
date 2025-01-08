<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{


    protected $table = 'menus';
    protected $primaryKey = 'menuID';

    protected $fillable = [
        'restaurantID',
        'name',
        'description',
        'price',
    ];

    // Restoran ile ilişki (Bir menü bir restorana aittir)
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurantID', 'restaurantID');
    }
}
