@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')


<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Админуудын жагсаалт
       
      </h1>
   
      <div class="text-right"><button class="btn btn-success" onclick="window.location.href='{{ url('/user/create') }}'" >Админ нэмэх</button>


        
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          
            <div class="box-header">

              <h3 class="box-title">Admin list</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Admin id</th>
                  <th>Админ нэр</th>
                  <th>Админ И майл</th>
                  <th>Төрөл</th>
                  <th>Тохиргоо</th>

                 
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                <tr>
               
                  <td>{{ $user->id}}</td> 
                  <td>{{ $user->user_name}}</td>
                  <td>{{ $user->email}}</td>
                  <td>{{ $user->role}}</td>
                 
                  @if (Auth::user()->role =="Master")
                     <td>

                   <div class="text-center">
                    <button class="btn btn-warning" onclick="window.location.href='{{ route('user.edit',$user->id) }}'">Засах</button>
                  <button class="btn btn-danger" onclick="window.location.href='{{ route('user.destroy',$user->id) }}'">Устгах</button>
                  </div>
                  </td>
                  @else
                  <td>
                   <button class="btn btn-info" onclick="window.location.href='{{ route('user.show',$user->id) }}'">Тухай</button>
                    </td>
                  @endif


                </tr>
                @endforeach
          
  
                </tbody>
                <tfoot>
                <tr>
                  <th>Admin id</th>
                  <th>Админ нэр</th>
                  <th>Админ И майл</th>
                  <th>Төрөл</th>
                  <th>Тохиргоо</th>
                  
                </tr>
                </tfoot>
               
              </table>
  {{ $users->links() }}
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
</div>


@stop
