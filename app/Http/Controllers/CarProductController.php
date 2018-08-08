<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarProducts;
use Image;
use Validator;
use Illuminate\Support\Facades\File;
class CarProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carproducts = CarProducts::paginate(7);
        return view('backend.carproduct.carproduct_index',compact('carproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.carproduct.carproduct_create');
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
        'product_name' => 'required|unique:car_product|max:100'

            ];

            $customMessages = [
                'product_name.required' => 'Үйлдвэрийн нэр оруулнуу !',
                'product_name.unique' => 'Үйлдвэрийн нэр давхардаж байна !'

            ];

            $this->validate($request, $rules, $customMessages);




        if ($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(1000,1000)->save(public_path('uploads/image/' . $filename  ));

            $product = new CarProducts;
            $product->product_name = $request->product_name;
   
            $product->image = $filename;
            $product->save();

        
        }

        else{
            $product = new CarProducts;
            $product->product_name = $request->product_name;
  
            $product->save();
        }


        \Session::flash('flash_message','Үйлдвэр амжилттай нэмэгдлээ ');
        return redirect('carproduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $carproduct = CarProducts::findOrFail($id);
        return view('backend.carproduct.carproduct_show',compact('carproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $carproducts = CarProducts::findOrFail($id);
        return view('backend.carproduct.carproduct_edit',compact('carproducts'));
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
          $product= CarProducts::findOrFail($id);

          
          if ($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(1000,1000)->save(public_path('uploads/image/' . $filename  ));

            $product->update([
                 'product_name' => $request->input('name'),
                 'image' => $filename,
        ]);

        
        }

        else{
           $product->update([
                 'product_name' => $request->input('name'),
        ]);
        }
        \Session::flash('flash_message','Үйлдвэр амжилттай засагдлаа ');
       return redirect('carproduct');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = CarProducts::find($id);
        $product->delete();

        \Session::flash('flash_message','Үйлдвэр амжилттай устлаа.');
        return redirect('carproduct');

    }
}
