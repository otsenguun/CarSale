<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;
use App\CarImg;
use Alert;

class CarImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $car = Cars::find($request->car_id);
        foreach ($request->car_img as $car_img) {
                    $filename = $car_img->store('car_img');
                    CarImg::create([
                        'car_id' => $car->id,
                        'filename' => $filename
                    ]);
                }
        // Alert::message('Зураг Нэмэгдлээ!');
        \Session::flash('flash_message','Зураг Нэмэгдлээ!');
        return \App::make('redirect')->back()->with('flash_success', 'Thank you,!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Cars::find($id);
        $carimgs = CarImg::where('car_id','=',$car->id)->get();
        return view('backend.car.carimg_show',compact('car','carimgs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carimgs = CarImg::find($id);
        $carimgs->delete(); 

        \Session::flash('flash_message','Зураг устлаа!');
        return \App::make('redirect')->back()->with('flash_success', 'Thank you,!');

    }
}
