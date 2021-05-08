<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">

    @include('client.layouts.components.car_carousel')
    <div class="car_choose_content">
        <ul class="info_list ul_li_block mb_15 clearfix" data-aos="fade-up" data-aos-delay="100">
            <li><strong>Passengers:</strong> {{$car->seats_number}}</li>
            <li><strong>Car class:</strong> {{$car->class->name}}</li>
            <li><strong>Age:</strong> {{$car->age}}</li>
            <li><strong>Gearbox type:</strong> {{$car->isAutomatic?'Auto':'Manual'}}</li>
            <li><strong>Fuel Type:</strong>{{$car->fuel_type}}</li>

        </ul>
        {{--<div data-aos="fade-up" data-aos-delay="200">
            <a class="terms_condition" href="#!"><i class="fas fa-info-circle mr-1"></i> Terms and conditions</a>
        </div>--}}

        <hr data-aos="fade-up" data-aos-delay="300">

        <div class="rent_details_info">
            <h4 class="list_title" data-aos="fade-up" data-aos-delay="100">Rent Details:</h4>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul class="info_list ul_li_block mb_15 clearfix" data-aos="fade-up" data-aos-delay="200">
                        <li><i class="fas fa-id-card"></i> Payment Guarantee</li>
                        <li><i class="fas fa-business-time"></i> Protect Your Rental</li>
                        <li><i class="fas fa-business-time"></i> Receipt by Email</li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul class="info_list ul_li_block mb_15 clearfix" data-aos="fade-up" data-aos-delay="300">
                        <li><i class="fas fa-user-friends"></i> Car Sharing</li>
                        <li><i class="fas fa-language"></i> Multilanguage Support</li>
                        <li><i class="fas fa-money-bill"></i> Payment Options</li>
                    </ul>
                </div>
            </div>
        </div>

        <hr data-aos="fade-up" data-aos-delay="100">


    </div>
</div>
