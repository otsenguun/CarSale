@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')

<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     

    <section class="content-header">
      <h1>
        Машины жагсаалт
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
        <li class="active">Машины жагсаалт</li>
      </ol>
  
        


      <div class="text-right"><button class="btn btn-success" onclick="window.location.href='{{ route('car.create') }}'" >Машин нэмэх</button>
      </div>
   
    </section>

    <!-- Main content -->
    <section class="content">
     @if (Session::has('flash_message'))
  <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Бүх Машинууд</h3>
               
            </div>
            {{ Form::open(['method'=>'get','url' => '/admin/car/search','files' => true]) }}
               
                
               
                 <div class ="col-md-10">{{ Form::text('search', $name,['class' => 'form-control','placeholder' =>'Машины нэр','width' => '100%'])}}</div>

                  <button type="submit" class="btn btn-primary"><span class="fa fa-search"> Хайлт</span></button>
                      
                            

            {{Form::close()}}
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>№</th>
                  <th>Зураг</th>
                  <th>Нэр</th>
                  <th>Үнэ</th>
                  <th>Нөхцөл</th>
                  <th>Явсан км</th>
                  <th>Хөдөлгүүр</th>
                  <th>Үрүүл</th>
                  <th>Гадна өнгө</th>
                  <th>Монголд орж ирсэн огноо</th>
                  <th>Тохиргоо</th>
                 
                </tr>
                </thead>
                <tbody>

                 
                @foreach($cars as $key =>$car)
                <tr>
                  <td>{{$key}}</td> 
                  <td> {{ HTML::image('uploads/carimg/'.$car->car_img, 'alt', [ 'width' => 100, 'height' => 100 ]) }}</td> 
                  <td><a href="{{route('car.show',$car->id)}}">{{$car->car_name}}</a></td>
                  <td>{{$car->price}}</td> 
                  <td>{{$car->temp}}</td>
                  <td>{{$car->km_run}}</td>
                  <td>{{$car->engine}}</td> 
                  <td>{{$car->wheel}}</td>
                  <td>{{$car->outcolor}}</td> 
                  <td>{{$car->mongolia_in}}</td> 
                  <td>
                   <div class="text-center">
                    <button class="btn btn-warning" onclick="window.location.href='{{ route('car.edit',$car->id) }}'">Засах</button>
                   <form method="Post" action="{{ url('/cardelete', $car->id) }}" class="delete_form">
                          {{ csrf_field() }}
                         <input type="hidden" name="_method" value="DELETE">

                          <button id="delete-btn1" class="btn btn-danger">Устгах
                              
                         </button>
                        </form>
                      </div>
                  </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
                
              </table>
            </div>
             <div class="text-left"><button class="btn btn-success" onclick="window.location.href='{{ route('car.index') }}'"><span class="fa fa-angle-left">  Жагсаалтруу буцах</span></button>
      </div>
              
            <!-- /.box-body -->
          </div>
   
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>
@stop