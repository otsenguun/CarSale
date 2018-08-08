<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarMarks;
use App\CarProducts;
use App\Cars;
use App\CarImg;
use App\User;
use Validator;
use Image;
use Alert; 
use Illuminate\Support\Facades\File;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $cars=Cars::paginate(8);

        return view('backend.car.car_index',compact('cars'));
       
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $carproducts = CarProducts::all();
        $selectproduct = [];
        foreach($carproducts as $carproduct){
            $selectproduct[$carproduct->id] = $carproduct->product_name;
        }

         $carmarks = CarMarks::all();
         $selectmark = [];
         foreach($carmarks as $carmark){
             $selectmark[$carmark->id] = $carmark->mark_name;
         }


        return view('backend.car.car_create',compact('selectproduct','selectmark')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
         $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";

     

         $rules = [
        'car_name' => 'required|max:100',
        'price' => array('regex:'.$regex),
        'km_run' => 'max:100',  
        'engine_size' => array('regex:'.$regex),
        'incolor' => 'max:100',
        'outcolor' => 'max:100',
        'maded_by' => 'max:100',
            ];

            $customMessages = [
                'car_name.required' => 'Машины нэр оруулнуу !',
                'price.price' => 'Машины үнэ буруу байна !',
                'engine_size.regex' => 'Хөдөлгүүрийн багтаамж буруу байна'

            ];

             $this->validate($request, $rules, $customMessages);

         


        

          
            

           
        if ($request->hasFile('car_img')){

            $avatar = $request->file('car_img');
            $imagename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(260,230)->save(public_path('uploads/carimg/' . $imagename  ));

            $car = new Cars;
            $car->car_name = $request->car_name;
            $car->price = $request->price;
            $car->temp = $request->temp;
            $car->type = $request->type;
            $car->description = $request->description;
            $car->car_product_id = $request->car_product_id;
            $car->car_mark_id = $request->car_mark_id;
            $car->km_run     = $request->km_run;
            $car->speedbox = $request->speedbox;
            $car->engine = $request->engine;
            $car->engine_size = $request->engine_size;
            $car->wheel = $request->wheel;
            $car->outcolor = $request->outcolor;
            $car->incolor = $request->incolor;
            $car->mongolia_in = $request->mongolia_in;
            $car->maded_by = $request->maded_by;
            $car->user_id = $request->user_id;
            $car->car_img = $imagename;
            $car->save();

                        if ($request->hasFile('car_imgs'))
                        {

                            foreach ($request->car_imgs as $car_img) 
                                {
                                    $filename = $car_img->store('car_imgs');
                                    CarImg::create([
                                        'car_id' => $car->id,
                                        'filename' => $filename
                                    ]);
                                }
        
                        }
  
        }

        else{
            $car = new Cars;
            $car->create($request->all());
        }
      
        \Session::flash('flash_message','Машин амжилттай нэмэгдлээ.');
        return redirect('car');
       


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $car = Cars::findOrFail($id);
        $carimgs = CarImg::where('car_id','=',$car->id)->get();
        $carproduct = CarProducts::findOrFail($car->car_product_id);
        $car_mark = Carmarks::findOrFail($car->car_mark_id);
        $user = User::findOrFail($car->user_id);
        

        return view('backend.car.car_show',compact('car','carimgs','carproduct','car_mark','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Cars::findOrFail($id);
        $carproducts = CarProducts::all();
        $selectproduct = [];
        foreach($carproducts as $carproduct){
            $selectproduct[$carproduct->id] = $carproduct->product_name;
        }
   
        $carmarks = Carmarks::where('car_product_id','=',$car->car_product_id)->get();
        $selectmark =[];
        foreach ($carmarks as $carmark) {
            $selectmark[$carmark->id] =$carmark->mark_name;
        }

        // $carmarks = CarMarks::all();
        // $selectmark = [];
        // foreach($carmarks as $carmark){
        //     $selectmark[$carmark->id] = $carmark->mark_name;
        // }
        $carimgs = CarImg::where('car_id','=',$car->id)->get();


        return view('backend.car.car_edit',compact('selectproduct','car','selectmark','carimgs')); 
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

        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
    
     

         $rules = [
        'car_name' => 'required|max:100',
        'price' => array('regex:'.$regex),
        'km_run' => 'max:100',  
        'engine_size' => array('regex:'.$regex),
        'incolor' => 'max:100',
        'outcolor' => 'max:100',
        'maded_by' => 'max:100',
            ];

            $customMessages = [
                'car_name.required' => 'Машины нэр оруулнуу !',
                'price.regex' => 'Машины үнэ буруу байна !',
                'engine_size.regex' => 'Хөдөлгүүрийн багтаамж буруу байна'

            ];

             $this->validate($request, $rules, $customMessages);


        if ($request->hasFile('car_img')){

            $avatar = $request->file('car_img');
            $imagename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(1000,1000)->save(public_path('uploads/carimg/' . $imagename  ));
             $car = Cars::findOrFail($id);
            $car->update([
                 'car_name' => $request->input('car_name'),
                 'price' => $request->input('price'),
                 'temp' => $request->input('temp'),
                 'type' => $request->input('type'),
                 'description' => $request->input('description'),
                 'car_product_id' => $request->input('car_product_id'),
                 'car_mark_id' => $request->input('car_mark_id'),
                 'km_run' => $request->input('km_run'),
                 'speedbox' => $request->input('speedbox'),
                 'engine' => $request->input('engine'),
                 'engine_size' => $request->input('engine_size'),
                 'wheel' => $request->input('wheel'),
                 'outcolor' => $request->input('outcolor'),
                 'incolor' => $request->input('incolor'),
                 'mongolia_in' => $request->input('mongolia_in'),
                 'maded_by' => $request->input('maded_by'),
                 'user_id' => $request->input('user_id'),
                 'car_img' => $imagename,
        ]);
      


        
        }

        else{
            $car = Cars::findOrFail($id);
            $car->update($request->all());
        }
        \Session::flash('flash_message','Машин амжилттай засагдлаа.');
        return redirect('car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Cars::findOrFail($id);
        $car->delete();
        \Session::flash('flash_message','Машин амжилттай устлаа.');
        return \App::make('redirect')->back()->with('flash_success', 'Deleted!');
    }

    public function search(Request $request)
    {   

        $name = $request->search;
        $cars = Cars::where('car_name','LIKE','%'.$name.'%')->get();
    
        return view('backend.car.list',compact('cars','name'));
    }
}
