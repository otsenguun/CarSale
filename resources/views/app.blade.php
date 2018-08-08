<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       <title>Car Sale</title>

    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png"/>



 <link rel="stylesheet" href="{{ URL::asset('css/master.css') }}"/>




 <link rel="stylesheet" href="{{URL::asset('assets/switcher/css/switcher.css')}}"/>

<!--  <link rel="alternate stylesheet" href="{{ URL::asset('assets/switcher/css/color1.css')}}') }}" title="color1" media="all" data-default-color="true"/> -->



    <link href="{{URL::asset('css/master.css')}}" rel="stylesheet">

    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="{{URL::asset('assets/switcher/css/switcher.css')}}" media="all"/>

     
    <style>
        
#sidePanel {
    width: 385px;
    position: fixed;
    left: -342px;
    top: 150px;
    z-index: 2000;
}

#panelHandle {
    background-image: -webkit-linear-gradient(top, #555, #444);
    background-image: -moz-linear-gradient(center top, #555, #444);
    background-image: -o-linear-gradient(center top, #555, #444);
    background-image: -ms-linear-gradient(center top, #555, #444);
    background-image: linear-gradient(center top, #555, #444);

    height: 150px;
    width: 32px;
    border-radius: 0 5px 5px 0;
    float: left;
    cursor: pointer;
}

#panelContent {
    float: left;
    border: 1px solid #555;
    width: 340px;
    height: 300px;
    background-color: #EEEEEE;
}

#panelHandle p {
    -moz-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    color: #FFFFFF;
    font-size: 18px;
    font-weight: bold;
    left: 0px;

    margin: 0;
    padding: 0;
    position: relative;
    top: 40px;
}

#panelHandle i {
    -moz-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    color: #FFFFFF;
    font-size: 18px;
    font-weight: bold;
    left: -1px;
    margin: 0;
    padding: 0;
    position: relative;
    top: 40px;
}
    </style>

    
    </head>
    
<body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">





@yield('content')
<script src="{{URL::asset('/js/jquery-1.11.3.min.js')}}" type="text/javascript"></script>

<script src="{{URL::asset('/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('/js/modernizr.custom.js')}}" type="text/javascript"></script>


<script src="{{URL::asset('/assets/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('/js/waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('/js/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('/js/classie.js')}}" type="text/javascript"></script>

<!--Switcher-->
<script src="{{URL::asset('/assets/switcher/js/switcher.js')}}" type="text/javascript"></script>
<!--Owl Carousel-->
<script src="{{URL::asset('/assets/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
<!--bxSlider-->
<script src="{{URL::asset('/assets/bxslider/jquery.bxslider.js')}}" type="text/javascript"></script>
<!-- jQuery UI Slider -->
<script src="{{URL::asset('/assets/slider/jquery.ui-slider.js')}}" type="text/javascript"></script>

<!--Theme-->
<script src="{{URL::asset('/js/jquery.smooth-scroll.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('/js/wow.min.js')}}" type="text/javascript"></script>

<script src="{{URL::asset('/js/jquery.placeholder.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('/js/theme.js')}}" type="text/javascript"></script>

 <script src="{{URL::asset('js/ajaxscript.js')}}"></script>
<script type="text/javascript" src="/js/carscroll.js"></script>

<!--Chat-->
<script>
    
        window.fbAsyncInit = function() {
        FB.init({
            appId      : '129846814309285',
            cookie     : true,
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    $(document).ready(function () {
        $('#panelHandle').hover(function () {
            $('#sidePanel').stop(true, false).animate({
                'left': '0px'
            }, 300);
        }, function () {
        });

        $('#sidePanel').hover(function () {
            // Do nothing
        }, function () {

            jQuery('#sidePanel').animate({
                left: '-341px'
            }, 300);

        });
    });
</script>


<script>
$(document).ready(function(){
       
   $("#search").keyup(function(){
       var str=  $("#search").val();
       if(str == "") {

               $( "#txtHint" ).html('pages.list');

       }else {
               $.get( "{{ url('/searchcar?id=') }}"+str, function( data ) {
                   $( "#txtHint" ).html( data );  
            });
       }
   });  
}); 
</script>

<script>
      $('#product').on('change',function(e){


          var prod_id =e.target.value;

          $.get('/ajax-carmark?prod_id=' + prod_id,function(data){

            $('#carmark').empty();
            $('#carmark').append('<option value="">---</option>');
            $.each(data,function(index,carmarkObj){


              $('#carmark').append('<option value="'+carmarkObj.id+'">'+carmarkObj.mark_name+'</option>');

              });

          });


       //    $.get('/productsearch?prod_id=' + prod_id,function(data){

       //     $( "#txtHint" ).html( data ); 
            

       // });

         


   });


    $("#loadcar").click(function() {
    console.log('clicked');
    $.get('/addlist',function(data){

                $( "#txtHint" ).append( data ); 
                

              });


  });

</script>









</body>

</html>
