@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')


<div class="content-wrapper">


<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Админ нэмэх</h3>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
              {{ HTML::ul($errors->all()) }}

                  {{ Form::open(array('route' => 'user.store')) }}

                      <div class="form-group">
                          {{ Form::label('name', 'Name') }}
                          {{ Form::text('name', '',array('class' => 'form-control')) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('email', 'Email') }}
                          {{ Form::email('email','', array('class' => 'form-control')) }}
                      </div>
                      <div class="form-group">
                          {{ Form::label('Password', '') }}
                          {{ Form::password('password', array('class' => 'form-control')) }}
                      </div>

                       <div class="form-group">
                          {{ Form::label('admin', 'Admin role') }}
                          {{Form::select('role', ['Master' => 'Master', 'Administrator' => 'Administrator'],'Administrator',['class' => 'form-control'])}};
                      </div>

                      {{ Form::submit('Нэмэх', array('class' => 'btn btn-primary')) }}

                  {{ Form::close() }}
            </div>
            <!-- /.box-body -->
           
          </div>

          

</div>



© 2016 - 2017 Appzia - All Rights Reserved.

@stop