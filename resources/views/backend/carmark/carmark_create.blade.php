@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')


<div class="wrapper">
<div class="content-wrapper">


<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Загвар оруулах</h3>
              <ol class="breadcrumb">
                <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                <li><a href="{{route('carmark.index')}}"><i class="fa fa-cog"></i> Загвар</a></li>
                <li class="active">Загвар оруулах</li>
              </ol>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
            {{ HTML::ul($errors->all()) }}
              <form enctype="multipart/form-data" role="form" action="{{route('carmark.store')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- text input -->
                <div class="form-group">
                  <label>Машины загвар</label>
                  <input type="text" name ="mark_name" class="form-control" placeholder="Enter ...">
                </div>
               
                <!-- select -->
                <div class="form-group">
                  <label>Машины үйлдвэр</label>
                  <select class="form-control" name="car_product_id">
                
                  @foreach ($carproducts as $carproduct)
                      <option value="{{$carproduct->id}}">{{ $carproduct->product_name }}</option>
                  @endforeach
                  </select>
                </div>             
                <!-- Select multiple-->
                <input type="submit" value="Оруулах">
                
              

              </form>
            </div>
            <!-- /.box-body -->
           
          </div>
</div>
</div>



© 2016 - 2017 Appzia - All Rights Reserved.

@stop