@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')

  <div class="wrapper">
  <div class="content-wrapper">


<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Машины зураг өөрчлөх</h3>
              <ol class="breadcrumb">
                  <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                  <li><a href="{{route('car.index')}}"><i class="fa fa-car"></i> Машин</a></li>
                  <li><a href="{{route('car.index')}}"><i class="fa fa-edit"></i> Машины зураг өөрчлөх</a></li>
                  <li class="active">Машины зураг өөрчлөх</li>
             </ol>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">




             </div>
            <!-- /.box-body -->
           
          </div>
</div>
</div>
@stop