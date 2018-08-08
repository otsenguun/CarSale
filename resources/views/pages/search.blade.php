
@if(!$searchcars->isEmpty())
    
    @foreach($searchcars as $car)
                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="b-items__cell">
                                <div class="b-items__cars-one-img">
                                {{ HTML::image('uploads/carimg/'.$car->car_img, 'alt', [ 'width' => 250, 'height' => 220 ]) }}
                                
                                </div>
                                <div class="b-items__cell-info">
                                    <div class="s-lineDownLeft b-items__cell-info-title">
                                        <h3>{{$car->car_name}}</h3>
                                    </div>
                                    <div class="row m-smallPadding">
                                        <div class="col-xs-6">
                                            <ul>
                                                <li>{{$car->maded_by}}</li>
                                                <li>{{$car->mongolia_in}}</li>
                                                <li>{{$car->engine_size}}</li>
                                                <li>{{$car->outcolor}}</li>
                                            </ul>
                                            <h5 class="b-items__cell-info-price">{{$car->price}} сая</h5>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="b-items__cell-info-km">
                                                <span class="fa fa-tachometer"></span>
                                                <p>{{$car->km_run}}KM</p>
                                            </div>
                                            <a href="{{url('/cardetail', $car->id)}}" class="btn m-btn">
                                                Дэлгэрэнгүй
                                                <span class="fa fa-angle-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

    @endforeach

@else
    Утга олдсонгүй

@endif

