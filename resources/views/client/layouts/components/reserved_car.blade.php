<div class="col-lg-4 col-md-8 col-sm-10 col-xs-12">
    <div class="feature_vehicle_item mt-0 ml-0" data-aos="fade-up" data-aos-delay="100">
            <h3 class="item_title mb-0">
                <a href="/car/{{$car->id}}">
                    {{$car->age}} {{$car->model}}
                </a>
            </h3>
            <div class="item_image position-relative">
                <a class="image_wrap" href="/car/{{$car->id}}">
                    <img src="{{asset($car->getPhoto())}}" alt="image_not_found">
                </a>
                <span class="item_price bg_default_blue">{{$car->price}}/Day</span>
            </div>
            <ul class="info_list ul_li_center clearfix">
                <li>{{$car->class->name}}</li>
                <li>{{$car->is_automatic?'Auto':'Manual'}}</li>
                <li>{{$car->seats_number}} Passengers</li>
                <li>{{$car->fuel_type}}</li>
            </ul>
        </div>
</div>
