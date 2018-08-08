@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')
<div class="wrapper">
<div class="content-wrapper">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Үйлдвэр оруулах</h3>
              <ol class="breadcrumb">
                <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                <li><a href="{{route('carproduct.index')}}"><i class="fa fa-wrench"></i> Үйлдвэр</a></li>
                <li class="active">Үйлдвэр оруулах</li>
              </ol>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
            

              {{ HTML::ul($errors->all()) }}
              {{ Form::open(['route' => 'carproduct.store','files' => true]) }}

                      <div class="form-group">
                          {{ Form::label('name', 'Name') }}
                          {{ Form::text('product_name', '',['class' => 'form-control']) }}
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

  </div>
</div>

@stop