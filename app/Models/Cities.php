<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;// Model için kullanılacak olan Factory sınıfını kullan

    protected $primaryKey = 'citiesID'; // Özel birincil anahtar
    protected $fillable = ['name'];// Doldurulabilir alanlar

    public function districts() // İlçeleri getir
    {
        return $this->hasMany(districts::class, 'citiesID', 'citiesID'); // İlçeler tablosu ile ilişki
    }

    public function restaurant() // Restoranları getir
    {
        return $this->hasMany(Restaurant::class, 'citiesID', 'citiesID'); // Restoranlar tablosu ile ilişki
    }
}
