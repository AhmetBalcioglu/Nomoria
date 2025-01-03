<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $primaryKey = 'reservationID';

    protected $fillable = [
        'restaurant_id',
        'customer_name',
        'customer_email',
        'reservation_date',
        'guest_count',
    ];

    // Restoran ile ilişki
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'restaurantID');
    }
}
