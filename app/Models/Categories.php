<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = ['categoryName','image'];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'categoryID');
    }
  
    public function favorites(){
        return $this->hasMany(Favorites::class, 'categoryID');

    }


