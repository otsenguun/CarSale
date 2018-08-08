<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
          {{ HTML::image('uploads/avatar/'.Auth::user()->avatar, 'User Image', [ 'class'=>'img-circle' ]) }}
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->user_name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         <li class="header">MAIN NAVIGATION</li>
        
        <li>
          <a href="{{ route('carproduct.index') }}">
            <i class="fa fa-wrench"></i> <span>Үйлдэрлэгчидийн жагсаалт</span>
            
          </a>
        </li>
        <li>
          <a href="{{ route('carmark.index') }}">
            <i class="fa fa-cog  "></i> <span>Загваруудын жагсаалт</span>
           
          </a>
        </li>
        <li>
          <a href="{{ route('car.index') }}">
            <i class="fa fa-car"></i> <span>Машин жагсаалт</span>
           
          </a>
        </li>
        <li>
          <a href="{{ route('slider.index') }}">
            <i class="fa fa-sliders"></i> <span>Нүүрний зураг</span>
           
          </a>
        </li>

      @if(Auth::user()->role =="Master")
        <li>
          <a href="{{ route('user.index') }}">
            <i class="fa fa-users"></i> <span>Админ жагсаалт</span>
           
          </a>
        </li>
     @endif
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>