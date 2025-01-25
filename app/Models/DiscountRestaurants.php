<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountRestaurants extends Model
{
    protected $table = 'discount_restaurants';

    protected $fillable = ['restaurantID'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurantID', 'restaurantID');
    }
}
