<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
  protected $table = "cars";


	protected $fillable = [
	        'id',
	        'car_name',
	        'price',
	        'temp',
            'type',
	        'car_product_id',
	        'car_mark_id',
	        'last_added',
	        'km_run',
	        'speedbox',
	        'engine',
	        'engine_size',
	        'wheel',
	        'outcolor',
	        'incolor',
	        'maded_by',
	        'mongolia_in',
            'description',
	        'user_id'
	    ];

     /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carproduct() {
        return $this->belongsTo('App\CarProducts', 'car_product_id');
    }

     /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carmark() {
        return $this->belongsTo('App\Carmarks', 'car_mark_id');
    }

     /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function images(){
        return $this->hasMany('App\CarImg','car_id');
    }

    public function _select() {

        $select = [
            'cars.id',
            'maded_by',
            'mongolia_in',
            'outcolor',
            'engine_size',
            'km_run',
            'price',
            'car_img',
            'car_mark.mark_name'
        ];

        return $this->select($select)
            ->join('car_mark', 'car_mark.id', '=', 'cars.car_mark_id')
            ->orderBy('cars.id', 'desc');

        // foreach ($where as $key => $value) {
        //     $result = $result->where($key, $value);
        // }

        // foreach ($like as $key => $value) {
        //     $result = $result->where($key, 'LIKE', '%' . $value . '%');
        // }
    }

    public function scopeWithWhere($query, $where = []) {
        foreach ($where as $key => $value) {
            if (!is_null($value)) {
                $query = $query->where('cars.' . $key, $value);
            }
        }
        return $query;
    }

    public function scopeWithLike($query, $like = []) {
        foreach ($like as $key => $value) {
            if (!is_null($value)) {
                $query = $query->where('cars.' . $key, 'LIKE', '%' . $value . '%');
            }
        }
        return $query;
    }

    public function scopeWithPaginate($query, $take = 12) {
        return $query->paginate($take);
    }

}
