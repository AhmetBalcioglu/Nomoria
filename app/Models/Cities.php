<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory; // Model için kullanılacak olan Factory sınıfını kullan

    protected $primaryKey = 'citiesID'; // Özel birincil anahtar
    protected $fillable = ['name']; // Doldurulabilir alanlar

    public static function getAllDistricts() // İlçeleri döndür a'dan z'ye sırala
    {
        return Districts::orderBy('name', 'asc')->get()->toArray();
    }
    public static function getAllCities() // İlleri döndür a'dan z'ye sırala 
    {
        return self::orderBy('name', 'asc')->get()->toArray();
    }
    public static function getCityName($cityID) // İl adını döndür
    {
        return self::where('citiesID', $cityID)->first()->name;
    }
    public static function getDistrictName($districtID) // İlçe adını döndür
    {
        return Districts::where('districtsID', $districtID)->first()->name;
    }
    public function restaurant() // Restoranları getir
    {
        return $this->hasMany(Restaurant::class, 'citiesID', 'citiesID');
    }
}
