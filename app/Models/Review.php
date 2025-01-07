<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews'; // Yorumlar tablosunun adı
    protected $primaryKey = 'id'; // Birincil anahtar
    public $timestamps = true; // created_at ve updated_at kullanmak için

    // Fillable alanları tanımla
    protected $fillable = [
        'restaurant_id',
        'user_id',
        'review',
        'rating',
    ];

    // Yabancı anahtar ilişkileri
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }
}
