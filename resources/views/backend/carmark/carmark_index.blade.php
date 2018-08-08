@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')
<div class="wrapper">
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Машины загваруудын жагсаалт
       
      </h1>
      <ol class="breadcrumb">
                <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                <li class="active">Загварууд</li>
              </ol>
      <div class="text-right"><button class="btn btn-success" onclick="window.location.href='{{ route('carmark.create') }}'" >Загвар нэмэх</button>


        
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
    @if (Session::has('flash_message'))
  <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Бүх загварууд</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>№</th>
                  <th>Загварын нэр</th>
                  <th>Үйлдвэр дэх загварууд нэр</th>
                  <th>Тохиргоо</th>
                 
                </tr>
                </thead>
                <tbody>

                <?php $i=0;?>
               @foreach($carmarks as $carmark)
                <tr>
             
                  <td><?php echo $i= $i+1; ?></td> 
                  <td>{{$carmark->mark_name}}</td> 
                  <td>{{$carmark->product_name}}</td> 
 

                  <td>
                   <div class="text-center">
                  
                  
                    <button class="btn btn-warning" onclick="window.location.href='{{ route('carmark.edit',$carmark->id) }}'">Засах</button>

                    <form method="Post" action="{{ url('/markdelete', $carmark->id) }}" class="delete_form">
                          {{ csrf_field() }}
                         <input type="hidden" name="_method" value="DELETE">

                          <button id="delete-btn1" class="btn btn-danger">Устгах
                              
                         </button>
                        </form>
                  
                  </div>
                  </td>
                </tr>
            @endforeach
         
            
  
                </tbody>
                  <div class="text-right">{{ $carmarks->links() }}</div>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  </div>
@stop