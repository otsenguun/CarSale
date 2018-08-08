
<style type="text/css">

.carimg {
  position: relative;
  margin-top: 50px;
  width: 300px;
  height: 200px;

}
.button {
  position: absolute;
  width: 60px;
  left:220px;
  bottom: 160px;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
}

.button a {
  width: 60px;
  padding: 12px 48px;
  text-align: center;
  color: red;
  border: solid 2px red;
  z-index: 1;
}

.carimg:hover .button {
  opacity: 1;
}
</style>
<div class="wrapper">
  <div class="content-wrapper">

    
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Машины дэлгэнгүй</h3>
              <ol class="breadcrumb">
                  <li><a href="{{route('user.index')}}"><i class="fa fa-dashboard"></i> Админ</a></li>
                  <li><a href="{{route('car.index')}}"><i class="fa fa-car"></i> Машин</a></li>
                  <li><a href="{{route('car.show',$car->id)}}"><i class="fa fa-car"></i> Машины дэлгэнгүй</a></li>
                  <li class="active">Машины зураг</li>
             </ol>
              @if (Session::has('flash_message'))
              <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                @endif

            
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
              {{Form::label('name',$car->car_name)}}
               {{Form::label('name','Машины зураг')}}
             </div> 
            
          
            @foreach($carimgs as $carimg)
             <div class="col-md-4">
                   <div class="carimg">
                        {{ HTML::image('app/'.$carimg->filename, 'alt', [ 'width' => 300, 'height' => 200 ]) }}
                        
                        <form method="POST" action="{{ url('/carimgdelete', $carimg->id) }}" class="delete_form">
                          {{ csrf_field() }}
                         <input type="hidden" name="_method" value="DELETE">

                          <button id="delete-btn1" class="button">
                              <i class="fa fa-trash delete-white"></i>
                         </button>
                        </form>
                      </div>

                      
              </div>
            @endforeach
             </div>
             <div class="box-body">
              {{ Form::open(['route' => 'carimg.store','files' => true]) }}
             <div class="form-group">
                          {{ Form::label('name', 'Зураг нэмэх') }}
                          {{ Form::file('car_img[]', ['multiple' => 'multiple','class' => 'form-control']) }}
              </div>
                          {{Form::hidden('car_id',$car->id)}}

                          {{ Form::submit('Зураг нэмэх', array('class' => 'btn btn-primary')) }}

           {{ Form::close() }}
           </div>
            <!-- /.box-body -->
           
          </div>
</div>
</div>
