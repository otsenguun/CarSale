@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')


<style type="text/css">

.carimg {
  position: relative;
  margin-top: 50px;
  width: 300px;
  height: 200px;

}
.button {
  position: absolute;
  width: 60px;
  left:220px;
  bottom: 160px;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
}

.button a {
  width: 60px;
  padding: 12px 48px;
  text-align: center;
  color: red;
  border: solid 2px red;
  z-index: 1;
}

.carimg:hover .button {
  opacity: 1;
}
</style>
   <div class="wrapper">
  <div class="content-wrapper">



<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Машин өөрчлөх</h3>
              <ol class="breadcrumb">
                  <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                  <li><a href="{{route('car.index')}}"><i class="fa fa-car"></i> Машин</a></li>
                  <li class="active">Машины өөрчлөх</li>
             </ol>

            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
             @if (Session::has('flash_message'))
              <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                @endif
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#editcar" data-toggle="tab">Машины мэдээлэл өөрчлөх</a></li>
              <li><a href="#editcarimg" data-toggle="tab">Машины бусад зураг өөрчлөх</a></li>
            </ul>
            </div>

             <div class="tab-content">
              <div class="active tab-pane" id="editcar">

              {{Form::model($car,['method'=>'PATCH','action'=>['CarController@update',$car->id],'files' => true] ) }}

                      <div class="form-group">
                          {{ Form::label('name', 'Нэр') }}
                          {{ Form::text('car_name', $car->car_name,['class' => 'form-control']) }}
                          <small class="text-danger">{{ $errors->first('car_name') }}</small>
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Үнэ') }}
                          {{ Form::text('price', $car->price,['class' => 'form-control']) }}
                            <small class="text-danger">{{ $errors->first('price') }}</small>
                      </div>
                       
                        <div class="form-group">
                          {{ Form::label('name', 'Төрөл') }}
                          {{Form::select('type', ['Суудал' => 'Суудал', 'Нийтийн' => 'Нийтийн', 'Ачааны' => 'Ачааны', 'Жиип' => 'Жиип','Гэр бүлийн'=>'Гэр бүлийн'],$car->temp,['class' => 'form-control'])}}
                      </div>

                       <div class="form-group">
                          {{ Form::label('name', 'Нөхцөл') }}
                         {{ Form::text('temp', $car->type,['class' => 'form-control'])}}
                      </div>
                        
                      <div class="form-group">
                      {{ Form::label('name', 'Үйлдвэр') }}
                                 {{ Form::select('car_product_id',$selectproduct,$car->product_name,['class'=>'form-control','id'=>'product']) }}
                      </div>

                     <div class="form-group">
                      {{ Form::label('name', 'Загвар') }}
                                 {{ Form::select('car_mark_id',$selectmark,$car->mark_name,['class'=>'form-control','id'=>'carmark']) }}
                      </div>

                    

                      <div class="form-group">
                          {{ Form::label('name', 'Нийт явсан km') }}
                          {{ Form::number('km_run', $car->km_run,['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Хурдны хайрцаг') }}
                            {{ Form::select('speedbox', ['Автомат' => 'Автомат', 'Механик' => 'Механик'],$car->speedbox,['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('name', 'Хөдөлгүүр') }}
                          {{ Form::select('engine', ['Бензин' => 'Бензин', 'Цахилгаан' => 'Цахилгаан', 'Дизель'=>'Дизель','Газ'=>'Газ'],$car->engine,['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('name', 'Хөдөлгүүрийн багтаамж') }}
                          {{ Form::number('engine_size', $car->engine_size,['class' => 'form-control']) }}
                          <small class="text-danger">{{ $errors->first('engine_size') }}</small>
                      </div>
                     <div class="form-group">
                          {{ Form::label('name', 'Үрүүл') }}
                          {{ Form::select('wheel', ['Буруу' => 'Буруу', 'Зөв' => 'Зөв'],$car->wheel,['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Гадна өнгө') }}
                          {{ Form::text('outcolor',$car->outcolor ,['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('name', 'Дотор өнгө') }}
                          {{ Form::text('incolor', $car->incolor,['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('name', 'Үйлдвэрлэсэн') }}
                          {{ Form::number('maded_by', $car->maded_by,['class' => 'form-control']) }}
                      </div>
                      <div class="form-group">
                          {{ Form::label('name', 'Монголд орж ирсэн') }}
                          {{ Form::date('mongolia_in', $car->mongolia_in,['class' => 'form-control']) }}
                      </div>
                      <div class="form-group">
                          {{ Form::label('name', 'Дэлгэрэнгүй мэдээлэл') }}
                          {{ Form::textarea('description', $car->description,['class' => 'form-control']) }}
                      </div>
                       {{ HTML::image('uploads/carimg/'.$car->car_img, 'alt', [ 'width' => 260, 'height' => 200 ]) }}
                       <div class="form-group">
                          {{ Form::label('name', 'Үйндсэн зураг') }}
                          {{ Form::file('car_img', ['class' => 'form-control']) }}
                      </div>

                      <!-- <div class="form-group">
                          {{ Form::label('name', 'Зураг') }}
                          {{ Form::file('car_img[]', ['multiple' => 'multiple','class' => 'form-control']) }}
                      </div> -->
                          {{Form::hidden('user_id',Auth::user()->id)}}

                            {{ Form::submit('Засах', ['class' => 'btn btn-primary']) }}

                        {{ Form::close() }}


            </div>
            <div class="tab-pane" id="editcarimg">


      
           
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
              {{Form::label('name',$car->car_name)}}
               {{Form::label('name','Машины зураг')}}
             </div> 
            
          
            @foreach($carimgs as $carimg)
             <div class="col-md-4">
                   <div class="carimg">
                        {{ HTML::image('app/'.$carimg->filename, 'alt', [ 'width' => 300, 'height' => 200 ]) }}
                        
                        <form method="POST" action="{{ url('/carimgdelete', $carimg->id) }}" class="delete_form">
                          {{ csrf_field() }}
                         <input type="hidden" name="_method" value="DELETE">

                          <button id="delete-btn1" class="button">
                              <i class="fa fa-trash delete-white"></i>
                         </button>
                        </form>
                      </div>

                      
              </div>
            @endforeach
             </div>
             <div class="box-body">
              {{ Form::open(['route' => 'carimg.store','files' => true]) }}
             <div class="form-group">
                          {{ Form::label('name', 'Зураг нэмэх') }}
                          {{ Form::file('car_img[]', ['multiple' => 'multiple','class' => 'form-control']) }}
              </div>
                          {{Form::hidden('car_id',$car->id)}}

                          {{ Form::submit('Зураг нэмэх', array('class' => 'btn btn-primary')) }}

           {{ Form::close() }}
  
            <!-- /.box-body -->
           
          </div>
            </div>
            </div>


                 

            </div>
            <!-- /.box-body -->
           
          </div>
</div>
</div>
<script src="{{ URL::asset('AdminLTE/bower_components/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script>
      $('#product').on('change',function(e){


          var prod_id =e.target.value;


          $.get('/ajax-carmark?prod_id=' + prod_id,function(data){

            $('#carmark').empty();
            $.each(data,function(index,carmarkObj){


              $('#carmark').append('<option value="'+carmarkObj.id+'">'+carmarkObj.mark_name+'</option>');

            });

       });


   });

</script>

@stop