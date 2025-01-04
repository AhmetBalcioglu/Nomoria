<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reservations';
    protected $primaryKey = 'reservationID';

    protected $fillable = [
        'restaurantID',
        'userID',
        'reservation_time',
        'guest_count',
        'status',
    ];

    // Yabancı anahtar ilişkileri
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurantID', 'restaurantID');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'userID', 'id');
    }

    // Kapasite kontrolü
    public static function checkReservationLimit($restaurantID, $guestCount)
    {
        // Şu anda o restoranda yapılmış olan tüm rezervasyonları al
        $totalGuests = self::where('restaurantID', $restaurantID)
                           ->where('status', 'confirmed') // Sadece onaylı rezervasyonları dikkate al
                           ->whereDate('reservation_time', '=', today()) // Bugün yapılan rezervasyonlar
                           ->sum('guest_count'); // Toplam misafir sayısını al

        // Toplam misafir sayısını kontrol et ve 20'yi geçip geçmediğini kontrol et
        if (($totalGuests + $guestCount) > 20) {
            return false; // 20 kişilik limit aşıldıysa, rezervasyonu kabul etme
        }

        return true; // Eğer limit aşılmadıysa, rezervasyon yapılabilir
    }
    
}
