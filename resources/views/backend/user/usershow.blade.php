@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')

<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    


    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-users"></i> {{$user->role}}
            <small class="pull-right">{{$user->created_at}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          
          <address>
            <strong>Carsale</strong><br>
             <div class="pull-left image">

              <img src="../uploads/avatar/{{ Auth::user()->avatar }}" style="height: 150px;width: 150px;" class="user-image" alt="User Image">
              
              </div>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
    
          <address>
            <strong>Админ дэлгэрэнгүй</strong><br>
            Админ: {{$user->user_name}}<br>
            Төрөл: {{$user->role}}<br>
            И-Майл: {{$user->email}}
          </address>
        </div>
   
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
      <h2 class="page-header">
       Оруулсан машинууд
          </h2>
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>id</th>
              <th>Нэр</th>
              <th>Нөхцөл</th>
              <th>Model</th>
              <th>Үнэ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
            <tr>
              <td>{{$car->id}}</td>
              <td>{{$car->car_name}}</td>
              <td>{{$car->temp}}</td>
              <td>{{$car->maded_by}}</td>
              <td>{{$car->price}}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

     
      <!-- /.row -->

      <!-- this row will not appear when printing -->
   
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  </div>

@stop