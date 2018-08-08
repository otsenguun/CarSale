@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')

<div class="wrapper">
  <div class="content-wrapper">


<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Машины дэлгэнгүй</h3>
              <ol class="breadcrumb">
                  <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                  <li><a href="{{route('car.index')}}"><i class="fa fa-car"></i> Машин</a></li>
                  <li class="active">Машины дэлгэнгүй</li>
             </ol>

             <div class="text-right">
             <a class="btn btn-success" href="{{ route('car.edit',$car->id) }}">Машины мэдээлэл засах</a>
             </div>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
            @if (Session::has('flash_message'))
  <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif

            <div class="col-md-12">
             <div class="col-md-3">
              {{ HTML::image('uploads/carimg/'.$car->car_img, 'alt', [ 'width' => 260, 'height' => 260 ]) }}
             </div>
              <div class="col-md-3">
              <h4 class="title">Машины тухай</h4>
                <div class="form-group">
                <label>Машины нэр :{{$car->car_name}}</label>

              
             </div>
             @if ($car->price == '0')
             <div class="form-group">
              <label>Машины үнэ :---</label>
       
             </div>
             @else
             <div class="form-group">
              <label>Машины үнэ :{{$car->price}}</label>
       
             </div>
          @endif
             <div class="form-group">
               <label>Нөхцөл :{{$car->temp}}</label>
            
             </div>
              <div class="form-group">
                <label>Төрөл :{{$car->type}}</label>
             
             </div>
             <div class="form-group">
               <label>Гадна өнгө:{{$car->outcolor}}</label>
             
             </div>
              <div class="form-group">
                <label>Дотор өнгө: {{$car->incolor}}</label>
            
             </div>

              </div>
              <div class="col-md-3">
              <h4 class="title">Машины эд анги</h4>
              <div class="form-group">
                <label>Хурдны хайрцаг: {{$car->speedbox}}</label>
            
             </div>
             <div class="form-group">
               <label>Хөдөлгүүр: {{$car->engine}}</label>
             
             </div>
              <div class="form-group">
                <label>Хөдөлгүүрийн багтаамж :{{$car->engine_size}}л</label>
        
             </div>
                <div class="form-group">
                  <label>Үйлдвэр :{{$carproduct->product_name}}</label>
            
             </div>
             <div class="form-group">
               <label>Загвар: {{$car_mark->mark_name}}</label>
           
             </div>
              <div class="form-group">
                <label>Үрүүл: {{$car->wheel}}</label>
            
             </div>
            
              </div>
              <div class="col-md-3">

              <h4 class="title">Машины түүх</h4>
                 <div class="form-group">
                   <label>Нийт явсан км: {{$car->km_run}}</label>
           
             </div>
             <div class="form-group">
               <label>Үйлдвэрлэсэн он: {{$car->maded_by}}</label>
            
             </div>
             <div class="form-group">
               <label>Монголд орж ирсэн он: {{$car->mongolia_in}}</label>
             
             </div>
             
              </div>

            </div>

             </div>
             <div class="box-body">
             {{Form::label('name','Машины бусад зураг')}}
             <div class="col-md-6">
             <label>Дэлгэрэнгүй мэдээлэл</label>
             </br>
               {{$car->description}}
             </div>
             <div class="col-md-6">
                         @if ( !empty ( $carimgs ) ) 
                          
                            @foreach($carimgs as $carimg)

                          {{ HTML::image('app/'.$carimg->filename, 'alt', [ 'width' => 100, 'height' => 100 ]) }}
                        @endforeach
                              

                         @else
                          Машины зураг оруулаагүй байна
                         @endif
                           
             </div>
             </div>
            <!-- /.box-body -->
           
          </div>
</div>
</div>


@stop