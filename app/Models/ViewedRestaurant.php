<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewedRestaurant extends Model
{
    protected $table = 'viewed_restaurants';

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurantID', 'restaurantID');
    }
}
