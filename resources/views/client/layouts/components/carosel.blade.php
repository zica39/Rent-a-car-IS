
<div class="offers_car_carousel slideshow4_slider" data-aos="fade-up" data-aos-delay="700">

    @foreach($random_cars as $car1)
    <div class="item">
        <div class="gallery_fullimage_2">
            <img src="{{asset($car1->getPhoto())}}" alt="image_not_found">
            <div class="item_content text-white">
                <span class="item_price bg_default_blue">{{$car1->price}}€/Day</span>
                <h3 class="item_title text-white">{{$car1->model}}</h3>
                <a class="text_btn text-uppercase" href="/car/{{$car1->id}}"><span>Book A Car</span> <img src="{{asset('assets/images/icons/icon_02.png')}}" alt="icon_not_found"></a>
            </div>
        </div>
    </div>
    @endforeach

</div>
