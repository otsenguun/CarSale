@extends('app')

@section('content')



    <body class="m-contacts" data-scrolling-animations="true">


@include('pages.partials.header')
@include('pages.partials.menu')



    <section class="b-pageHeader">

        <div class="container">

            <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Холбоо барих</h1>

        </div>

    </section><!--b-pageHeader-->



    <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">

        <div class="container">

            <a href="/" class="b-breadCumbs__page">Эхлэл</a><span class="fa fa-angle-right"></span><a

                    href="/contact.php" class="b-breadCumbs__page m-active">Холбоо барих</a>

        </div>

    </div><!--b-breadCumbs-->



    <section class="b-contacts s-shadow">

        <div class="container">

            <div class="row">

                <div class="col-xs-6">

                    <div class="b-contacts__form">

                        <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">

                            <h2 class="s-titleDet">И-мэйл бичих</h2>

                        </header>

                        <p class=" wow zoomInUp" data-wow-delay="0.5s">Зээлийн хүсэлтйн талаар энд бичнэ үү</p>

                        <div id="success"></div>

                        <form id="contactForm" method="post" action="/sendmail" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s">
                            
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <input type="text" placeholder="Таны нэр" value="" name="name" id="user-name">

                            <input type="text" placeholder="И-мэйл" value="" name="email"

                                   id="user-email"/>

                            <input type="text" placeholder="Утасны дугаар" value="" name="phone" id="user-phone">

                            <textarea id="user-message" name="content"

                                      placeholder="..."></textarea>

                            <span>Captcha </span><img src="/captcha">

                            <input type="text" name="captcha">

                            <button type="submit" class="btn m-btn">ИЛГЭЭХ<span class="fa fa-angle-right"></span>

                            </button>

                        </form>

                    </div>

                </div>

                <div class="col-xs-6">

                    <div class="b-contacts__address">

                        <div class="b-contacts__address-hours">

                            <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">АЖИЛЫН ЦАГ</h2>

                            <div class="b-contacts__address-hours-main wow zoomInUp" data-wow-delay="0.5s">

                                <div class="row">

                                    <div class="col-md-6 col-xs-12">

                                        <h5>ТӨВ ОФФИС</h5>

                                        <p>Да-Ба : 9:00am - 18:00pm <br/></p>

                                    </div>

                                    <div class="col-md-6 col-xs-12">

                                        <h5>БОРЛУУЛАГЧИД</h5>

                                        <p>Утасаар 7/24</p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="b-contacts__address-info">

                            <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">opening hours</h2>

                            <address class="b-contacts__address-info-main wow zoomInUp" data-wow-delay="0.5s">

                                <div class="b-contacts__address-info-main-item">

                                    <span class="fa fa-home"></span>

                                    ADDRESS

                                    <p>UB Март 5 давхар</p>

                                </div>

                                <div class="b-contacts__address-info-main-item">

                                    <div class="row">

                                        <div class="col-lg-3 col-md-4 col-xs-12">

                                            <span class="fa fa-phone"></span>

                                            PHONE

                                        </div>

                                        <div class="col-lg-9 col-md-8 col-xs-12">

                                            <em>(+976) - 96999988</em>

                                        </div>

                                    </div>

                                </div>

                                <div class="b-contacts__address-info-main-item">

                                    <div class="row">

                                        <div class="col-lg-3 col-md-4 col-xs-12">

                                            <span class="fa fa-envelope"></span>

                                            EMAIL

                                        </div>

                                        <div class="col-lg-9 col-md-8 col-xs-12">

                                            <em>info@car-sale.mn</em>

                                        </div>

                                    </div>

                                </div>

                            </address>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section><!--b-contacts-->


@include('pages.partials.footer')
@stop