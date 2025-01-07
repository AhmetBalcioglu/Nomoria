<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

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
