<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'categoryID');
    }
}
