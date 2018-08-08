<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

         $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
        return [
        'name' => 'required|max:100',
        'price' => 'required|max:100',
        'km_run' => 'max:100',  
        'engine_size' => 'required|regex',
        'incolor' => 'max:100',
        'outcolor' => 'max:100',
        'maded_by' => 'max:100',
    ];
        
    }
}
