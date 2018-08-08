@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')
 <div class="wrapper">
<div class="content-wrapper">


<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Загвар өөрчлөх</h3>
              <ol class="breadcrumb">
                <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                <li><a href="{{route('carmark.index')}}"><i class="fa fa-cog"></i> Загвар</a></li>
                <li class="active">Загвар өөрчлөх</li>
              </ol>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
            


              {{Form::model($carmark,['method'=>'PATCH','action'=>['CarMarkController@update',$carmark->id],'files' => true] ) }}
                      <div class="form-group">
                          {{ Form::label('name', 'Name') }}
                          {{ Form::text('name', $carmark->mark_name,['class' => 'form-control']) }}
                      </div>

              

                      <div class="form-group">
                         
                          {{ Form::label('name', 'Үйлдвэр') }}
                          {{ Form::select('car_product_id',$select, $carmark->car_product_id,['class'=>'form-control']) }}
                    
                      </div>

                      {{ Form::submit('Засах', ['class' => 'btn btn-primary']) }}

                  {{ Form::close() }}





            </div>
            <!-- /.box-body -->
           
          </div>
</div>
</div>

@stop