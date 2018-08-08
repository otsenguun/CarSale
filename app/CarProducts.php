<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarProducts extends Model
{
      protected $table = "car_product";

    protected $fillable = [
        'product_name',
        'image'
    ]; 
   public function carmarks()
    {
        return $this->hasOne('App\Carmarks');
    }
}
