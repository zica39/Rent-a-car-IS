<!-- slider_section - start
    ================================================== -->
<section class="slider_section text-white text-center position-relative clearfix">
    <div class="main_slider clearfix">
        @foreach($cars as $car)
            <div class="item has_overlay d-flex align-items-center" data-bg-image="{{asset($car->getPhoto())}}">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="slider_content text-center">
                                <h3 class="text-white text-uppercase" data-animation="fadeInUp" data-delay=".3s">{{$car->model}}</h3>
                                <p data-animation="fadeInUp" data-delay=".5s">
                                    Class: {{$car->class->name}}, Gearbox type: {{$car->isAutomatic?'Automatic':'Manual'}} , Fuel Type: {{$car->fuel_type}}, Price: {{$car->price}}€
                                </p>
                                <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay=".7s">
                                    <a class="custom_btn bg_default_red btn_width text-uppercase" href="/reservation/create?car={{$car->id}}">Book Now <img src="{{asset('assets/images/icons/icon_01.png')}}" alt="icon_not_found"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="carousel_nav clearfix">
        <button type="button" class="main_left_arrow"><i class="fal fa-chevron-left"></i></button>
        <button type="button" class="main_right_arrow"><i class="fal fa-chevron-right"></i></button>
    </div>
</section>
<!-- slider_section - end
================================================== -->

