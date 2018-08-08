<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarImg extends Model
{

	protected $fillable = ['car_id', 'filename'];

    public function cars()
    {
        return $this->belongsTo('App\Cars');
    }
    
}
