@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')


<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Машины үйлдвэрлэгчдийн жагсаалт
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
        <li class="active">Үйлдвэрүүдийн жагсаалт</li>
      </ol>

      <div class="text-right"><button class="btn btn-success" onclick="window.location.href='{{ route('carproduct.create') }}'" >Үйлдвэр нэмэх</button>


        
      </div>
    </section>
 <section class="content">
  @if (Session::has('flash_message'))
  <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif
      <div class="row">
        <div class="col-xs-12">
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Бүх Үйлпвэрүүд</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Үйлдвэрийн нэр</th>
                  <th>Үйлдвэрийн айкон</th>
                  <th>Тохиргоо</th>

                 
                </tr>
                </thead>
                <tbody>
    <!-- Main content -->

    <?php $i=0;?>
@foreach($carproducts as $carproduct)
       <td><?php echo $i= $i+1; ?></td> 

                  <td>{{ $carproduct->product_name}}</td>
                   <td><img class="img-circle" src="uploads/image/{{$carproduct->image}}" style="width: 50;height: 50px;"></td>

                  <td>
                   <div class="text-center">
                    <button class="btn btn-warning" onclick="window.location.href='{{ route('carproduct.edit',$carproduct->id) }}'">Засах</button>
                  
                 <form method="Post" action="{{ url('/productdelete', $carproduct->id) }}" class="delete_form">
                          {{ csrf_field() }}
                         <input type="hidden" name="_method" value="DELETE">

                          <button id="delete-btn1" class="btn btn-danger">Устгах
                              
                         </button>
                        </form>

                 


                  


                  </div>
                  </td>

                </tr>
  
@endforeach
<div class="text-right">{{ $carproducts->links() }}</div>
  
    <!-- /.content -->
    </div>
    </div>
    </div>

        <!-- /.col -->
      </div>

      <!-- /.row -->
    </section>

  </div>

  </div>



  @stop
