@extends('app')

@section('content')

    <body class="m-about" data-scrolling-animations="true">



@include('pages.partials.header')
@include('pages.partials.menu')



    <section class="b-pageHeader">

        <div class="container">

            <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Бидний тухай</h1>

        </div>

    </section><!--b-pageHeader-->



    <div class="b-breadCumbs s-shadow">

        <div class="container">

            <a href="/" class="b-breadCumbs__page">Эхлэл</a><span class="fa fa-angle-right"></span><a

                    href="/about.php" class="b-breadCumbs__page m-active">Бидний тухай</a>

        </div>

    </div><!--b-breadCumbs-->



    <section class="b-best">

        <div class="container">

            <div class="row">

                <div class="col-sm-6 col-xs-12">

                    <div class="b-best__info">

                        <header class="s-lineDownLeft b-best__info-head">

                            <h2 class="wow zoomInUp" data-wow-delay="0.5s">“CAR SALE” ХХК</h2>

                        </header>

                        <p class="wow zoomInUp" data-wow-delay="0.5s">

                            “CAR SALE” ХХК нь шинэ болон хуучин /орж ирсэн/, монголд явж байсан автомашины худалдааны

                            компани юм.Та мнай компанийн carsale.mn сайтнаас автомашин худалдааны бүх төрлийн зар, мэдээ

                            мэдээлэл болон үнэ ханш зэрэг олон мэдээллийг нэг дор авах боломжтой болох юм.

                            Та өөрт хэрэгцээтэй байгаа Япон, Солонгос, Америк зэрэг улсад үйлдвэрлэсэн, шинэ болон орж

                            ирсэн монголд явж байсан, суудлын, жийп, гэр бүлийн, пикап, спорт автомашинуудын мэдээллийг

                            өргөн сонголттойгоор авахыг хүсэж байвал “carsale.mn” танд туслах болно.

                            Жолоогоо бариад салхи татуулан давхи, CAR SALE

                        </p>

                        <h6 class="wow zoomInUp" data-wow-delay="0.5s">

                            Бидний үйлчилгээ:

                        </h6>

                        <p class="wow zoomInUp" data-wow-delay="0.5s">

                            “CAR SALE” ХХК нь хэрэглэгч та бүхэнд хайсан автомашинаа олоход зөвлөж, туслах бөгөөд

                            найдвартай, баталгаатай, хямд үнэтэй автомашиныг санал болгохоос гадна та машины үнийн

                            дүнгийн 30%-г төлөөд л биднээс лизингээр машинаа өдөрт нь авах боломжтой.

                        </p>

                    </div>

                </div>

                <div class="col-sm-6 col-xs-12">

                    <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best"

                         src="/media/about/best.jpg"/>

                </div>

            </div>

        </div>

    </section><!--b-best-->



    <section class="b-more">

        <div class="container">

            <div class="row">

                <div class="col-sm-6 col-xs-12">

                    <div class="b-more__why wow zoomInLeft" data-wow-delay="0.5s">

                        <h2 class="s-title">Дараах мэдээллийг авч болно</h2>

                        <ul class="s-list">

                            <li>

                                <span class="fa fa-check"></span>Авто машинтай холбоотой мэдээ мэдээлэл, зөвөлгөө

                            </li>

                            <li><span class="fa fa-check"></span>Авто машины үнийн болон хүчин чадлын харьцуулалт</li>

                            <li><span class="fa fa-check"></span>Авто машины зээлийн тооцоолуур болон татвар,

                                үйлчилгээ,хямдрал, урамшуулалын мэдээлэл

                            </li>

                        </ul>

                    </div>

                </div>

                <div class="col-sm-6 col-xs-12">

                    <div class="b-more__info wow zoomInRight" data-wow-delay="0.5s">

                        <h2 class="s-title">Худалдан авалт</h2>

                        <div class="b-more__info-block">

                            <div class="b-more__info-block-title m-active">

                                Бэлнээр авах

                                <a class="j-more" href="#"><span class="fa fa-angle-down"></span></a>

                            </div>

                            <div class="b-more__info-block-inside j-inside m-active">

                                <p>

                                    Борлуулагчтай холбогдон сонгосон машинаа шууд авах болно.

                                </p>

                            </div>

                        </div>

                        <div class="b-more__info-block">

                            <div class="b-more__info-block-title m-active">

                                Лизингээр худалдан авах

                                <a href="#" class="j-more"><span class="fa fa-angle-down"></span></a>

                            </div>

                            <div class="b-more__info-block-inside j-inside m-active">

                                <p>

                                    Сонгосон машины үнийн дүнгийн 30%-г төлөөд Car Sale ХХК-н харилцдаг банк /ББСБ/ - ын

                                    онцгой нөхцөлөөр хамгийн бага хүүтэй лизингийн үйлчилгээнд хамрагдаж өдөрт нь

                                    машинаа авах боломжтой болно.

                                </p>

                            </div>

                        </div>

                        <div class="b-more__info-block">

                            <div class="b-more__info-block-title m-active">

                                Банкны зээлээр худалдан авах

                                <a href="#" class="j-more"><span class="fa fa-angle-down"></span></a>

                            </div>

                            <div class="b-more__info-block-inside j-inside m-active">

                                <p>

                                    Та өөрийн харилцдаг банкны зээлийн үйлчилгээгээр сонгосон машинаа авах боломжтой.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section><!--b-more-->



@include('pages.partials.footer')
@stop