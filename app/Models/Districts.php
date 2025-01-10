<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;

    protected $primaryKey = 'districtsID'; // Özel birincil anahtar
    protected $fillable = ['name', 'citiesID'];

    public function city()
    {
        return $this->belongsTo(Cities::class, 'citiesID', 'citiesID');
    }

    public function restaurant()
    {
        return $this->hasMany(Restaurant::class, 'districtsID', 'districtsID');
    }
}
