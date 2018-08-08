<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Cars;
use Image;

use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(7);
        return view('backend.slider.sliderindex',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             return view('backend.slider.slidercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

           
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920,641)->save(public_path('uploads/slider/' . $filename  ));
      

            $silder = new Slider;
            $silder->title = $request->title;    
            $silder->name = $request->name;   
            $silder->model = $request->model;   
            $silder->price = $request->price;   
            $silder->link = $request->link;    
            $silder->image = $filename;
            $silder->save();

            \Session::flash('flash_message','Слайдэр амжилттай нэмэгдлээ ');
            return redirect('slider');
        
        }

        else{

            \Session::flash('flash_message','Слайдэрsын зураг оруулнуу !!!');
            return \App::make('redirect')->back()->with('flash_success', 'Deleted!');
        }



        
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
        $sliders = Slider::find($id);
        return view('backend.slider.slideredit',compact('sliders'));
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


         if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920,641)->save(public_path('uploads/slider/' . $filename  ));
      
           

            $slider = Slider::find($id);
            

             $slider->update([
                 'title' => $request->input('title'),
                 'name' => $request->input('name'),
                 'model' => $request->input('model'),
                 'price' => $request->input('price'),
                  'link' => $request->input('link'),
                 'image' => $filename,
        ]);
       

            \Session::flash('flash_message','Слайдэр амжилттай засагдлаа ');
            return redirect('slider');
        
        }

        else{
             $slider = Slider::find($id);
            

             $slider->update([
                 'title' => $request->input('title'),
                 'name' => $request->input('name'),
                 'model' => $request->input('model'),
                 'price' => $request->input('price'),
                  'link' => $request->input('link')
        ]);
            \Session::flash('flash_message','Слайдэр амжилттай засагдлаа !!!');
           return redirect('slider');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
         \Session::flash('flash_message','Слайдэр амжилттай устлаа ');
            return redirect('slider');
    }
}
