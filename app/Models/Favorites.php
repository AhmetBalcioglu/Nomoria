<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorites extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    protected $primaryKey = 'favoritesID';

    public $incrementing = false;

    protected $fillable = ['restaurantID', 'categoryID', 'userID'];

    public $timestamps = false;

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurantID', 'restaurantID');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'userID', 'userID');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'categoryID', 'categoryID');
    }
}

