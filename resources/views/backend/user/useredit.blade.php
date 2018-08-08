@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')


<style type="text/css">
  .container{
    margin-top:20px;
}
.image-preview-input {
    position: relative;
  overflow: hidden;
  margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
</style>
<div class="content-wrapper">


<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Админ Засах</h3>
            </div>
          
            <!-- /.box-header -->
            <div class="box-body">
      

                  {{ Form::model($user,['method'=>'PATCH','action'=>['UserController@update',$user->id]] ) }}

                      <div class="form-group">
                          {{ Form::label('name', 'Name') }}
                          {{ Form::text('name', $user->user_name,['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('email', 'Email') }}
                          {{ Form::email('email',$user->email, ['class' => 'form-control']) }}
                      </div>
                      <div class="form-group">
                          {{ Form::label('Password', '') }}
                          {{ Form::password('password', ['class' => 'form-control']) }}
                      </div>

                      <div class="form-group">
                          {{ Form::label('admin', 'Admin role') }}
                          {{Form::select('role', ['Master' => 'Master', 'Administrator' => 'Administrator'], $user->role,['class' => 'form-control'])}};
                      </div>

                      {{ Form::submit('Засах', ['class' => 'btn btn-primary']) }}

                  {{ Form::close() }}

            </div>
            
            <!-- /.box-body -->
           
          </div>

          

</div>

<script type="text/javascript">
  $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>



© 2016 - 2017 Appzia - All Rights Reserved.

@stop