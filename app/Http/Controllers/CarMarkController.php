<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\CarMarks;
use App\CarProducts;
use Image;
use Illuminate\Support\Facades\File;

class CarMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $carmarks = CarMarks::join('car_product', 'car_product.id', '=', 'car_product_id')
                                ->paginate(7, array('car_mark.id', 'car_mark.mark_name', 'car_product.product_name'));

                           

        return view('backend.carmark.carmark_index',compact('carmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carproducts = CarProducts::all();
        return view('backend.carmark.carmark_create',compact('carproducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
         $rules = [
        'mark_name' => 'required|unique:car_mark|max:100'

            ];

            $customMessages = [
                'mark_name.required' => 'Загварын нэр оруулнуу !',
                'mark_name.unique' => 'Загварын нэр давхардаж байна !'

            ];

            $this->validate($request, $rules, $customMessages);

        $carmarks = new CarMarks;
        $carmarks->mark_name =$request->mark_name;
        $carmarks->car_product_id = $request->car_product_id;

     
            $carmarks->save();
            \Session::flash('flash_message','Загвар амжилттай нэмэгдлээ.');
            return redirect('carmark');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carmark = CarMarks::find($id);
        $carproducts = CarProducts::all();
        $select = [];
        foreach($carproducts as $carproduct){
            $select[$carproduct->id] = $carproduct->product_name;
        }

       
        return view('backend.carmark.carmark_edit',compact('carmark','select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $carmark = CarMarks::find($id);
        $carmark->mark_name =$request->name;
        $carmark->car_product_id = $request->car_product_id;
        $carmark->save();
        \Session::flash('flash_message','Загвар амжилттай засагдлаа.');
        return redirect('carmark');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carmark=CarMarks::find($id);
        $carmark->delete();
        \Session::flash('flash_message','Загвар амжилттай устлаа.');
        return redirect('carmark');
    }
}
