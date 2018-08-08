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
              {{ Form::open(['route' => 'slider.store','files' => true]) }}

                      <div class="form-group">
                          {{ Form::label('name', 'Гарчиг') }}
                          {{ Form::text('title', '',['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Нэр') }}
                          {{ Form::text('name', '',['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Модел') }}
                          {{ Form::text('model', '',['class' => 'form-control']) }}
                      </div>
                       <div class="form-group">
                          {{ Form::label('name', 'Үнэ') }}
                          {{ Form::number('price', '',['class' => 'form-control']) }}
                      </div>
                      <div class="form-group">
                          {{ Form::label('name', 'Линк') }}
                          {{ Form::text('link','',['class' => 'form-control','placeholder' =>'Холбогдох машины id оруулнуу !']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('name', 'Зураг') }}
                          {{ Form::file('image', ['class' => 'form-control']) }}
                      </div>
                  

                      {{ Form::submit('Нэмэх', ['class' => 'btn btn-primary']) }}

                  {{ Form::close() }}


            </div>
            <!-- /.box-body -->
           
          </div>
    <!-- /.content -->
  </div>
</div>
@stop