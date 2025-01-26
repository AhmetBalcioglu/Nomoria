<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailImage extends Model
{
    protected $table = 'detail_image';

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class, 'detail_image_id', 'detail_image_id');
    }

}
