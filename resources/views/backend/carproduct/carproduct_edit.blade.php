@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')

<div class="wrapper">
 <div class="content-wrapper">


<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Үйлдвэр өөрчлөх</h3>
              <ol class="breadcrumb">
                <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                <li><a href="{{route('carproduct.index')}}"><i class="fa fa-wrench"></i> Үйлдвэр</a></li>
                <li class="active">Үйлдвэр өөрчлөх</li>
              </ol>
            </div>
                
            <div class="box-body">
              {{ Form::model($carproducts,['method'=>'PATCH','action'=>['CarProductController@update',$carproducts->id],'files' => true] ) }}
           <label>Үйлдвэрийн лого</label>

              {{ HTML::image('uploads/image/'.$carproducts->image, 'alt', [ 'width' => 70, 'height' => 70 ]) }}
                      <div class="form-group">
                          {{ Form::label('name', 'Name') }}
                          {{ Form::text('name', $carproducts->product_name,['class' => 'form-control']) }}
                      </div>

            

                     

                      <div class="form-group">
                          {{ Form::label('name', 'Зураг') }}
                          {{ Form::file('image', ['class' => 'form-control']) }}
                      </div>

                      {{ Form::submit('Засах', ['class' => 'btn btn-primary']) }}

                  {{ Form::close() }}
            </div>
       
          </div>
</div>
</div>
@stop