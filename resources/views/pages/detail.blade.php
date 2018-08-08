@extends('app')

@section('content')



<body class="m-detail" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">



@include('pages.partials.header')
@include('pages.partials.menu')



<section class="b-pageHeader">

    <div class="container">

        <h1 class="wow zoomInLeft" data-wow-delay="0.5s">Машины Дэлгэрэнгүй Хуудас</h1>

    </div>

</section><!--b-pageHeader-->



<div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">

    <div class="container">

        <a href="home.html" class="b-breadCumbs__page">Нүүр хуудас</a><span class="fa fa-angle-right"></span><a

                href="listings.html" class="b-breadCumbs__page">Машинууд</a><span class="fa fa-angle-right"></span><a

                href="listingsTwo.html" class="b-breadCumbs__page">{{$carproduct->product_name}}</a><span class="fa fa-angle-right"></span><a

                href="detail.html" class="b-breadCumbs__page m-active">{{$carmark->mark_name}}</a>

    </div>

</div><!--b-breadCumbs-->



<section class="b-detail s-shadow">

    <div class="container">

        <header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">

            <div class="row">

                <div class="col-sm-9 col-xs-12">

                    <div class="b-detail__head-title">

                        <h1>{{$car->carmark->mark_name}}</h1>

                        <h3>{{$car->carproduct->product_name}}</h3>

                    </div>

                </div>

                <div class="col-sm-3 col-xs-12">

                    <div class="b-detail__head-price">
                    @if($car->price=='0')
                        <div class="b-detail__head-price-num">---</div>
                        @else
                        <div class="b-detail__head-price-num">{{$car->price}}сая</div>
                        @endif
                        <p>Included Taxes &amp; Checkup</p>

                    </div>

                </div>

            </div>

        </header>

        <div class="b-detail__main">

            <div class="row">

                <div class="col-md-8 col-xs-12">

                    <div class="b-detail__main-info">

                        <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">

                            <div class="row m-smallPadding">

                                <div class="col-xs-10">

                                    <ul class="b-detail__main-info-images-big bxslider enable-bx-slider"

                                        data-pager-custom="#bx-pager" data-mode="horizontal" data-pager-slide="true"

                                        data-mode-pager="vertical" data-pager-qty="5">
                                 
                                        @foreach($carimgs as $carimg)

                                        <li class="s-relative">

                                            <a data-toggle="modal" data-target="#myModal" href="#"

                                               class="b-items__cars-one-img-video"><span class="fa fa-film"></span>VIDEO</a>

                                           
                                            {{ HTML::image('app/'.$carimg->filename, 'alt', [ 'width' => 620, 'height' => 485 ]) }}

                                        </li>

                                        @endforeach()



                                    </ul>

                                </div>

                                <div class="col-xs-2 pagerSlider pagerVertical">

                                    <div class="b-detail__main-info-images-small" id="bx-pager">

                                        @foreach($carimgs as $key => $carimg)

                                        <a href="#" data-slide-index="{{ $key }}" class="b-detail__main-info-images-small-one">

                                       
                                            {{ HTML::image('app/'.$carimg->filename, 'alt', [ 'width' => 100, 'height' => 80 ]) }}
                                        </a>

                                        @endforeach



                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">

                             <h2 class="s-titleDet">Машины тухай</h2>
                             {{$car->description}}

                        </div>

                      

                    </div>

                </div>

                <div class="col-md-4 col-xs-12">

                    <aside class="b-detail__main-aside">

                        <div class="b-detail__main-aside-desc wow zoomInUp" data-wow-delay="0.5s">

                            <h2 class="s-titleDet">Description</h2>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Үйлдвэр</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$carproduct->product_name}}</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Загвар</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$carmark->mark_name}}</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Нийт явсан км</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->km_run}}км</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Нөхцөл</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->temp}}</p>

                                </div>

                            </div>
                             <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Төрөл</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->type}}</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Хурдны хайрцаг</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->speedbox}}</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Хөдөлгүүр</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->engine}}</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Хөдөлгүүрийн багтаамж</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->engine_size}}</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Үрүүл</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->wheel}}</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Гадна өнгө</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->outcolor}}</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Дотор өнгө</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->incolor}}</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Үйлдвэрлэсэн он</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->maded_by}}</p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6">

                                    <h4 class="b-detail__main-aside-desc-title">Монголд орж ирсэн</h4>

                                </div>

                                <div class="col-xs-6">

                                    <p class="b-detail__main-aside-desc-value">{{$car->mongolia_in}}</p>

                                </div>

                            </div>
 

                        </div>

                        <div class="b-detail__main-aside-payment wow zoomInUp" data-wow-delay="0.5s">

                            <h2 class="s-titleDet">CAR PAYMENT CALCULATOR</h2>

                            <div class="b-detail__main-aside-payment-form">

                                <form action="/" method="post">

                                    <input type="text" placeholder="TOTAL VALUE/LOAN AMOUNT" value="" name="name"/>

                                    <input type="text" placeholder="DOWN PAYMENT" value="" name="name"/>

                                    <div class="s-relative">

                                        <select name="select" class="m-select">

                                            <option value="">LOAN TERM IN MONTHS</option>

                                        </select>

                                        <span class="fa fa-caret-down"></span>

                                    </div>

                                    <input type="text" placeholder="INTEREST RATE IN %" value="" name="name"/>

                                    <button type="submit" class="btn m-btn">ESTIMATE PAYMENT<span

                                                class="fa fa-angle-right"></span></button>

                                </form>

                            </div>

                            <div class="b-detail__main-aside-about-call">

                                <span class="fa fa-calculator"></span>

                                <div>$250 <p>PER MONTH</p></div>

                                <p>Total Number of Payments: <span>50</span></p>

                            </div>

                        </div>

                    </aside>

                </div>

            </div>

        </div>

    </div>

</section><!--b-detail-->



<section class="b-related m-home">

    <div class="container">

        <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br/>

        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">ИЖИЛ ТӨСТЭЙ МАШИНУУД</h2>

        <div class="row">

            @foreach($reletcar as $car)

            <div class="col-md-3 col-xs-6">

                <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">

            
                     {{ HTML::image('uploads/carimg/'.$car->car_img, 'alt',[ 'width' => 200, 'height' => 150 ]) }}


                    <div class="b-world__item-val">

                        <span class="b-world__item-val-title">ҮЙЛДВЭРЛЭГДСЭН <span>{{$car->maded_by}}</span></span>

                    </div>

                    <h2><a href="{{url('/cardetail', $car->id)}}l">{{$car->carmark->mark_name}}</a></h2>

                    <div class="b-auto__main-item-info s-lineDownLeft">
                                @if($car->price==0)
								<span class="m-price">

                                    ---

                                </span> 
                                @else
                                <span class="m-price">

                                    {{$car->price}}сая

                                </span> 
                                @endif

                        <span class="m-number">

									<span class="fa fa-tachometer"></span>{{$car->km_run}}KM

								</span>

                    </div>

                    <div class="b-featured__item-links m-auto">

                        <a href="#">Ашиглсан</a>

                        <a href="#">{{$car->mongolia_in}}</a>

                        <a href="#">{{$car->speedbox}}</a>

                        <a href="#">{{$car->temp}}</a>

                        <a href="#">{{$car->outcolor}}</a>

                        

                    </div>

                </div>

            </div>
            @endforeach

            

        </div>

    </div>

</section><!--"b-related-->



<section class="b-brands s-shadow">

    <div class="container">

        <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">MORE</h5><br/>

        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">Машины үйлдвэрлэгчид</h2>

        <div class="">
            @foreach($carproducts as $prodcut)

            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">

             
                {{ HTML::image('uploads/image/'.$prodcut->image, 'alt',[ 'width' => 80, 'height' => 60 ]) }}

            </div>
            @endforeach
          

        </div>

    </div>

</section><!--b-brands-->



<div class="b-features">

    <div class="container">

        <div class="row">

            <div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">

                <ul class="b-features__items">

                    <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>

                    <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Car Dealership</li>

                    <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multipoint Safety Check</li>

                </ul>

            </div>

        </div>

    </div>

</div><!--b-features-->



<div class="b-info">

    <div class="container">

        <div class="row">

            <div class="col-md-3 col-xs-6">

                <aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">

                    <article class="b-info__aside-article">

                        <h3>OPENING HOURS</h3>

                        <div class="b-info__aside-article-item">

                            <h6>Sales Department</h6>

                            <p>Mon-Sat : 8:00am - 5:00pm<br/>

                                Sunday is closed</p>

                        </div>

                        <div class="b-info__aside-article-item">

                            <h6>Service Department</h6>

                            <p>Mon-Sat : 8:00am - 5:00pm<br/>

                                Sunday is closed</p>

                        </div>

                    </article>

                    <article class="b-info__aside-article">

                        <h3>Бидний тухай</h3>

                        <p>“CAR SALE” ХХК нь хэрэглэгч та бүхэнд хайсан автомашинаа олоход зөвлөж, туслах бөгөөд найдвартай, баталгаатай, хямд үнэтэй автомашиныг санал болгохоос гадна та машины үнийн дүнгийн 30%-г төлөөд л биднээс лизингээр машинаа өдөрт нь авах боломжтой.</p>

                    </article>

                    <a href="{{url('/about')}}" class="btn m-btn">Read More<span class="fa fa-angle-right"></span></a>

                </aside>

            </div>

            <div class="col-md-3 col-xs-6">

                <div class="b-info__latest">

                    <h3>СҮҮЛД НЭМЭГДСЭН</h3>
                    @foreach($cars as $car)

                    <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">

                        
                        {{ HTML::image('uploads/carimg/'.$car->car_img, 'alt',['class' => 'b-info__latest-article-photo m-audi']) }}
                            <div class="b-info__latest-article-info">

                            <h6><a href="{{url('/cardetail', $car->id)}}">{{$car->carmark->mark_name}}</a></h6>

                            <p><span class="fa fa-tachometer"></span>{{$car->km_run}}KM</p>

                        </div>

                    </div>


                    @endforeach


                </div>

            </div>

            <div class="col-md-3 col-xs-6">

                <div class="b-info__twitter">

                    <h3>from twitter</h3>

                    <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">

                        <div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>

                        <div class="b-info__twitter-article-content">

                            <p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>

                            <span>20 minutes ago</span>

                        </div>

                    </div>

                    <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">

                        <div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>

                        <div class="b-info__twitter-article-content">

                            <p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>

                            <span>20 minutes ago</span>

                        </div>

                    </div>

                    <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">

                        <div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>

                        <div class="b-info__twitter-article-content">

                            <p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>

                            <span>20 minutes ago</span>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-3 col-xs-6">

                <address class="b-info__contacts wow zoomInUp" data-wow-delay="0.3s">

                    <p>Холбоо барих</p>

                    <div class="b-info__contacts-item">

                        <span class="fa fa-map-marker"></span>

                        <em>UB Март 5 давхар</em>

                    </div>

                    <div class="b-info__contacts-item">

                        <span class="fa fa-phone"></span>

                        <em>Phone: (+976) - 96999988</em>

                    </div>

                    <div class="b-info__contacts-item">

                        <span class="fa fa-envelope"></span>

                        <em>Email: info@car-sale.mn</em>

                    </div>

                </address>

               

            </div>

        </div>

    </div>

</div><!--b-info-->


@include('pages.partials.footer')
@stop

 