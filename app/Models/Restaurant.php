<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurant';
    protected $primaryKey = 'restaurantID';


    protected $fillable = [
        'image',
        'name',
        'description',
        'address',
        'phone',
        'email',
    ];



}
