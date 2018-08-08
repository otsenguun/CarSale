<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Slider;
use App\Cars;
use App\CarImg;
use App\CarMarks;
use App\CarProducts;

class PageController extends Controller
{

    var $cars;

    public function __construct(Cars $cars) {
        $this->cars = $cars;
    }

    public function homeshow(){

    	$sliders =Slider::all();
    	
			$cars = Cars::orderBy('id', 'desc')->limit(5)->get();
             $carmarks = CarMarks::all();
          

	


    	return view('welcome',compact('sliders','cars'));

    }

    public function detail($id){
    	 $car=Cars::find($id);
    	 $carmark =Cars::find($id)->carmark;
    	 $carproduct = Cars::find($id)->carproduct;
    	 $carimgs = Carimg::where('car_id','=',$id)->get();

         $carproducts =CarProducts::orderBy('id', 'desc')->limit(7)->get();
         $reletcar = Cars::where('car_mark_id','=',$car->car_mark_id)->limit(4)->get();
         $cars = Cars::orderBy('id', 'desc')->limit(3)->get();
    	return view('pages.detail',compact('car','carmark','carproduct','carimgs','carproducts','cars','reletcar'));
    }



    public function carlist(Request $request){
        return view('pages.carlist')
            ->withCars($this->cars->_select()
                    ->withWhere($request->only('car_product_id', 'car_mark_id'))
                    ->withLike($request->only('car_name'))
                    ->withPaginate(12))
            ->withCarProducts(CarProducts::all())
            ->withCarMarks(CarMarks::getByCarProductId($request->get('car_product_id')))
            ->withInputs($request->all());
    }


    public function search(Request $request){


         $search = $request->id;

        if (is_null($search))
        {
             $cars = Cars::paginate(12);

        return view('pages.list',compact('cars'));      
        }

        else
        {
        $searchcars =Cars::where('car_name', 'LIKE', '%'.$search.'%')->get();
        $searchedvalue = $request->search;
        return view('pages.search',compact('searchcars','searchedvalue'));
        }


       
      
    }

    public function productsearch(){
        $prod_id = Input::get('prod_id');
        $searchcars = Cars::where('car_mark_id','=',$prod_id)->get();
   
        return view('pages.search',compact('searchcars'));
    }

    public function carlistadd(Request $request){


        $cars = $this->cars->_select()
                    ->withWhere($request->only('car_product_id', 'car_mark_id'))
                    ->withLike($request->only('car_name'))
                    ->withPaginate(12);

        $view = view('pages.list')
            ->withCars($cars)
            ->withCarProducts(CarProducts::all())
            ->withCarMarks(CarMarks::getByCarProductId($request->get('car_product_id')))
            ->withInputs($request->all())->render();

        return json_encode([
            'view' => $view,
            'number_of_rows' => $cars->count(),
            'log' => $request->only('car_name')
        ]);

    }

   


}
