<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory, SoftDeletes; // Soft delete özelliğini ekler

    protected $table = 'restaurants'; // Tablo adı (laravel varsayılan olarak model isminin çoğulunu kullanır)
    protected $primaryKey = 'restaurantID'; // Birincil anahtar

    // Fillable alanlar
    protected $fillable = [
        'guid',
        'image',
        'name',
        'description',
        'address',
        'phone',
        'email',
    ];

    // Yabancı anahtar ilişkilerini tanımlayabilirsiniz
    public function reviews()
    {
        return $this->hasMany(Review::class, 'restaurant_id', 'restaurantID');
    }
}
