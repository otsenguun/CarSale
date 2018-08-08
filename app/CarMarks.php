<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarMarks extends Model
{
    protected $table = "car_mark";

    protected $fillable = [
        'mark_name',
        'car_product_id'
    ];

     /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carproducts()
    {
        return $this->belongsTo('App\CarProducts','car_product_id');
    }
     public function car()
    {
        return $this->hasOne('App\Cars');
    }

    public static function getByCarProductId($car_product_id) {
        return static::where('car_product_id', $car_product_id)->get();
    }
}
