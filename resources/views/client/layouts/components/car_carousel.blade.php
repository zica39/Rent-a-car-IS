<div class="car_choose_carousel mb_30 clearfix">
    <div class="thumbnail_carousel" data-aos="fade-up" data-aos-delay="100">
        @foreach($car->getPhotos() as $photo)
        <div class="item">
            <div class="item_head">
                <h4 class="item_title mb-0">{{$car->model}}</h4>
                <ul class="review_text ul_li_right clearfix">
                    <li class="text-right">
                        <strong>{{$car->fuel_type}}</strong>
                    </li>
                    <li><span class="bg_default_blue">{{$car->age}}</span></li>
                </ul>
            </div>
            <img src="{{asset($photo)}}" alt="image_not_found">
            <ul class="btns_group ul_li_center clearfix">
                <li>
                    <span class="custom_btn btn_width bg_default_blue">{{$car->price}}€/Day</span>
                </li>
                <li>
                    <a href="/reservation/create?car={{$car->id}}" class="custom_btn btn_width bg_default_red text-uppercase">Book A Car <img src="{{asset('assets/images/icons/icon_01.png')}}" alt="icon_not_found"></a>
                </li>
            </ul>
        </div>
        @endforeach
    </div>

    <div class="thumbnail_carousel_nav" data-aos="fade-up" data-aos-delay="100">
       @foreach($car->getPhotos() as $photo)
        <div class="item">
            <img src="{{asset($photo)}}" alt="image_not_found">
        </div>
        @endforeach
    </div>
</div>
