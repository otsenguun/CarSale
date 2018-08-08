@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')


 <div class="wrapper">
 <div class="content-wrapper">


      <section class="content">
      <div class="">
            <div class="page-header-title">
              <h4 class="page-title">
                Машин оруулах
              </h4>
              <ol class="breadcrumb">
                  <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                  <li><a href="{{route('car.index')}}"><i class="fa fa-car"></i> Машин</a></li>
                  <li class="active">Машины оруулах</li>
             </ol>
            </div>
          </div>
          <div class="page-content-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-sm-10">
                  <div class="panel panel-primary">
                    <div class="panel-body">
                      <h4 class="m-t-0 m-b-30">
                        Машины мэдээлэлүүд
                      </h4>
                      <div class="row">

	                        <div class="col-sm-10 col-xs-10">
		                          
			                          <div class="m-t-20">
                               
			                           
			      {{ Form::open(['route' => 'car.store','files' => true]) }}

                      
                      <div class="form-group">
                          {{ Form::label('name', 'Нэр') }}
                          {{ Form::text('car_name', '',['class' => 'form-control'])}}
                          <small class="text-danger">{{ $errors->first('car_name') }}</small>

                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Үнэ') }}
                          {{ Form::text('price', '',['class' => 'form-control']) }}
                          <small class="text-danger">{{ $errors->first('price') }}</small>
                      </div>
                       
                        <div class="form-group">
                          {{ Form::label('name', 'Төрөл') }}
                          {{Form::select('type', ['Суудал' => 'Суудал', 'Нийтийн' => 'Нийтийн', 'Ачааны' => 'Ачааны', 'Жиип' => 'Жиип','Гэр бүлийн'=>'Гэр бүлийн'],null,['class' => 'form-control'])}}
                      </div>
                      <div class="form-group">
                          {{ Form::label('name', 'Нөхцөл') }}
                         {{ Form::text('temp', '',['class' => 'form-control'])}}
                      </div>

            						<div class="form-group">
          						{{ Form::label('name', 'Үйлдвэр') }}
                                 {{ Form::select('car_product_id',$selectproduct,null,['class'=>'form-control','id'=>'product']) }}
          						</div>

                      <div class="form-group">
                      
                        
                        {{ Form::label('name', 'Үйлдвэр') }}
                                 {{ Form::select('car_mark_id',$selectmark,null,['class'=>'form-control','id'=>'carmark']) }}
                      </div>
          				

                      <div class="form-group">
                          {{ Form::label('name', 'Нийт явсан km') }}
                          {{ Form::number('km_run', '',['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Хурдны хайрцаг') }}
                           {{ Form::select('speedbox', ['Автомат' => 'Автомат', 'Механик' => 'Механик'],null,['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('name', 'Хөдөлгүүр') }}
                          {{ Form::select('engine', ['Бензин' => 'Бензин', 'Цахилгаан' => 'Цахилгаан', 'Дизель'=>'Дизель','Газ'=>'Газ'],null,['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('name', 'Хөдөлгүүрийн багтаамж') }}
                          {{ Form::text('engine_size', '',['class' => 'form-control']) }}
                          <small class="text-danger">{{ $errors->first('engine_size') }}</small>
                      </div>
                     <div class="form-group">
                          {{ Form::label('name', 'Үрүүл') }}
                          {{ Form::select('wheel', ['Буруу' => 'Буруу', 'Зөв' => 'Зөв'],null,['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Гадна өнгө') }}
                          {{ Form::text('outcolor', '',['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('name', 'Дотор өнгө') }}
                          {{ Form::text('incolor', '',['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('name', 'Үйлдвэрлэсэн') }}
                          {{ Form::number('maded_by', '',['class' => 'form-control']) }}
                      </div>
                      <div class="form-group">
                          {{ Form::label('name', 'Монголд орж ирсэн') }}
                          {{ Form::date('mongolia_in', '',['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Дэлгэрэнгүй мэдээлэл') }}
                          {{ Form::textarea('description', '',['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('name', 'Үйндсэн зураг') }}
                          {{ Form::file('car_img', ['class' => 'form-control']) }}
                      </div>


                      <div class="form-group">
                          {{ Form::label('name', 'Бусад зураг') }}
                          {{ Form::file('car_imgs[]', ['multiple' => 'multiple','class' => 'form-control']) }}
                      </div>
                      		{{Form::hidden('user_id',Auth::user()->id)}}
                      	
                 

                      {{ Form::submit('Нэмэх', array('class' => 'btn btn-primary')) }}

                  {{ Form::close() }}
                   


</div>
</div>
</div>



                       



</div>
    </section>


</div>


         




@stop
