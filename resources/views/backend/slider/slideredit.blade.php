@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')

<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     

   <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Слайдэр оруулах</h3>
              <ol class="breadcrumb">
                <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                <li><a href="{{route('slider.index')}}"><i class="fa fa-wrench"></i> Слайдэр</a></li>
                <li class="active">Слайдэр оруулах</li>
              </ol>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
            
        
              {{ HTML::ul($errors->all()) }}
         
            
              {{ Form::model($sliders,['method'=>'PATCH','action'=>['SliderController@update',$sliders->id],'files' => true] ) }}
                      <div class="form-group">
                          {{ Form::label('name', 'Гарчиг') }}
                          {{ Form::text('title', $sliders->title,['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Нэр') }}
                          {{ Form::text('name', $sliders->name,['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Модел') }}
                          {{ Form::text('model', $sliders->model,['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Үнэ') }}
                          {{ Form::number('price', $sliders->price,['class' => 'form-control']) }}
                      </div>
                      <div class="form-group">
                          {{ Form::label('name', 'Линк') }}
                          {{ Form::text('link', $sliders->link,['class' => 'form-control']) }}
                      </div>
                      {{ HTML::image('uploads/slider/'.$sliders->image, 'alt', [ 'width' => 600, 'height' => 300 ]) }}
                      <div class="form-group">
                          {{ Form::label('name', 'Зураг') }}
                          {{ Form::file('image', ['class' => 'form-control']) }}
                      </div>
                  

                      {{ Form::submit('Засах', ['class' => 'btn btn-primary']) }}

                  {{ Form::close() }}


            </div>
            <!-- /.box-body -->
           
          </div>
    <!-- /.content -->
  </div>
</div>
@stop