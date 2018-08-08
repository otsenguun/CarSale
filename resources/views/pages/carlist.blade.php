@extends('app')

@section('content')
<style type="text/css">
    .signal {
    border: 5px solid #333;
    border-radius: 30px;
    height: 30px;
    left: 50%;
    margin: -15px 0 0 -15px;
    opacity: 0;
    position: absolute;
    top: 100%;
    width: 30px;
 
    animation: pulsate 1s ease-out;
    animation-iteration-count: infinite;
}

@keyframes pulsate {
    0% {
      transform: scale(.1);
      opacity: 0.0;
    }
    50% {
      opacity: 1;
    }
    100% {
      transform: scale(1.2);
      opacity: 0;
    }
}
.form-control{
    border-radius: 0;
    height: 39px;
}
</style>
 <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>

    <body class="m-contacts" data-scrolling-animations="true">


@include('pages.partials.header')
@include('pages.partials.menu')

    <section class="b-modal">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Video</h4>
                    </div>
                    <div class="modal-body">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/a_ugz7GoHwY"
                                allowfullscreen></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section><!--b-modal-->



    <section class="b-pageHeader">
        <div class="container">
            <h1 class="wow zoomInLeft" data-wow-delay="0.5s">Автомашин</h1>
        </div>
    </section><!--b-pageHeader-->

    <div class="b-breadCumbs s-shadow">
        <div class="container wow zoomInUp" data-wow-delay="0.5s">
            <a href="/" class="b-breadCumbs__page">Эхлэл</a><span class="fa fa-angle-right"></span><a
                    href="{{url('/carlist')}}" class="b-breadCumbs__page m-active">Автомашин</a>
        </div>
    </div><!--b-breadCumbs-->

    <div class="b-items" style="padding: 30px;">
        <div class="container">
           



   
 
            
          
  

        <!-- search -->
         
                <!-- testsearch --> 
                {{ Form::open(['method'=>'get']) }}
            <div class="col-xs-12 search-tab-2 tab-pane active in">
            <div class="col-xs-11" style="padding-right: 0px;">
            <div class="col-xs-4 nopadding">
                    {{ Form::text('car_name', Request::get('car_name'), ['id'=>'searchname' ,'class' => 'form-control ','placeholder' =>'Машины нэр','width' => '100%'])}}
                    </div>
            <div class="col-xs-4 smallpadding">
                    <select class="form-control search3-select select2 select2-hidden-accessible" name="car_product_id" id="product" placeholder="Үйлдвэрлэгч" data-value="" tabindex="-1" aria-hidden="true">
                         <option value="">Үйлдвэрлэгч</option>
                          @foreach ($car_products as $value)
                            <option {{ Request::get('car_product_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">
                                {{ $value->product_name }}
                            </option>
                        @endforeach
                    </select>
            </div>
            <div class="col-xs-4 nopadding">
                    <select class="form-control search3-select select2 select2-hidden-accessible" name="car_mark_id" id="carmark" placeholder="Машины марк" data-value="" tabindex="-1" aria-hidden="true">
                        <option value="">Машины модель</option>
                        @foreach ($car_marks as $value)
                            <option {{ Request::get('car_mark_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">
                                {{ $value->mark_name }}
                            </option>
                        @endforeach
                    </select>
            </div>
            </div>
            <div class="col-xs-1">
                <button type ="submit" class="btn yellow-btn" style="border-radius: 0; height: 39px;"> <span class="fa fa-search"></span></button>
            </div>

        </div>
                {{Form::close()}}
            <!-- end search -->




            <div class="row" style="padding-top: 130px;">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="row">
                    <div id="txtHint">
                    @foreach($cars as $car)
                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s">
                                <div class="b-items__cars-one-img">
                                {{ HTML::image('uploads/carimg/'.$car->car_img, 'alt', [ 'width' => 250, 'height' => 220 ]) }}
                                
                                </div>
                                <div class="b-items__cell-info">
                                    <div class="s-lineDownLeft b-items__cell-info-title">
                                        <h3>{{$car->mark_name}}</h3>
                                    </div>
                                    <div class="row m-smallPadding">
                                        <div class="col-xs-6">
                                            <ul>
                                                <li>{{$car->maded_by}}</li>
                                                <li>{{$car->mongolia_in}}</li>
                                                <li>{{$car->engine_size}}</li>
                                                <li>{{$car->outcolor}}</li>
                                            </ul>
                                             @if ($car->price =='0')
                                            <h5 class="b-items__cell-info-price">---</h5>
                                            @else
                                            <h5 class="b-items__cell-info-price">{{$car->price}} сая</h5>
                                            @endif
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="b-items__cell-info-km">
                                                <span class="fa fa-tachometer"></span>
                                                <p>{{$car->km_run}}KM</p>
                                            </div>
                                            <a href="{{url('/cardetail', $car->id)}}" class="btn m-btn">
                                                Дэлгэрэнгүй
                                                <span class="fa fa-angle-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

               
              
                    <div id="loader"></div>
                       
                      
            </div>

    @if (count($cars) === 0)
   Хайлт олдсонгүй</br>
                   <div class="text-center"><a href="{{url('/carlist')}}" class="btn" style="background-color: #ffbe37; color: #000">
                         БУЦАХ
                   
                    </a></div> 
   

 
@endif
   
                  
            

                        
                    

                </div>

            </div>

            
        </div>
    </div><!--b-items-->

@include('pages.partials.footer')
@stop

