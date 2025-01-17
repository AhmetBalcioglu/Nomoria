<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comment extends Model
{
  protected $fillable = [
    'restaurantID',
    'userID',
    'user_name',
    'rating',
    'comment',
  ];


  public function user()
  {
    return $this->belongsTo(Users::class, 'userID');
  }

  public function restaurant()
  {
    return $this->belongsTo(Restaurant::class, 'restaurantID');
  }
}

