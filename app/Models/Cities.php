<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $primaryKey = 'citiesID'; // Özel birincil anahtar
    protected $fillable = ['name'];

    public function districts()
    {
        return $this->hasMany(districts::class, 'citiesID', 'citiesID');
    }

    public function restaurant()
    {
        return $this->hasMany(Restaurant::class, 'citiesID', 'citiesID');
    }
}
