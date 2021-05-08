
@foreach($reservations as $reservation)
<div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center {{$loop->odd?'bg-light':'bg-white'}} my-4" style="padding-top:20px">

    <div class="col-lg-4 col-md-9 col-sm-10 col-xs-12">
        <div class="feature_vehicle_item mt-0 ml-0" data-aos="fade-up" data-aos-delay="100">
            <h3 class="item_title mb-0">
                <a href="#!">
                    {{$reservation->car->age}} {{$reservation->car->model}}
                </a>
            </h3>
            <div class="item_image position-relative">
                <a class="image_wrap" href="#!">
                    <img src="{{asset($reservation->car->getPhoto())}}" alt="image_not_found">
                </a>
                <span class="item_price bg_default_blue">{{$reservation->car->price}}€/Day</span>
            </div>
            <ul class="info_list ul_li_center clearfix">
                <li>{{$reservation->car->class->name}}</li>
                <li>{{$reservation->car->is_automatic?'Auto':'Manual'}}</li>
                <li>{{$reservation->car->seats_number}} Passengers</li>
                <li>{{$reservation->car->fuel_type}}</li>
            </ul>
        </div>
    </div>

    <div class="col-lg-8 col-md-9 col-sm-10 col-xs-12">
        <div class="cart_info_content">
            <div class="row mt__30">
                <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                    <div class="cart_address_item" data-aos="fade-up" data-aos-delay="100">
                        <h4>Pick Up Location:</h4>
                        <p class="mb-0"><i class="fas fa-map-marker-alt"></i> {{$reservation->puLocation()->name}}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cart_address_item" data-aos="fade-up" data-aos-delay="200">
                        <h4>Pick Up Date:</h4>
                        <p class="mb-0"><i class="fas fa-calendar-alt"></i> {{$reservation->pick_up_date}}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="cart_address_item" data-aos="fade-up" data-aos-delay="300">
                        <h4>Time:</h4>
                        <p class="mb-0"><i class="fas fa-clock"></i> {{$reservation->pick_up_time}}</p>
                    </div>
                </div>

                <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                    <div class="cart_address_item" data-aos="fade-up" data-aos-delay="400">
                        <h4>Return Car Location:</h4>
                        <p class="mb-0"><i class="fas fa-map-marker-alt"></i> {{$reservation->retLocation()->name}}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cart_address_item" data-aos="fade-up" data-aos-delay="500">
                        <h4>Return Date:</h4>
                        <p class="mb-0"><i class="fas fa-calendar-alt"></i> {{$reservation->return_date}}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="cart_address_item" data-aos="fade-up" data-aos-delay="600">
                        <h4>Time:</h4>
                        <p class="mb-0"><i class="fas fa-clock"></i> {{$reservation->return_time}}</p>
                    </div>
                </div>
            </div>


            <div class="cart_offers_include">
                <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="900">
                    <ul class="cart_info_list ul_li_block clearfix" data-aos="fade-up" data-aos-delay="300">
                        @foreach($reservation->accessories as $res)
                            @if($loop->odd)
                                <li><i class="far fa-check-circle"></i> {{$res->accessory->name}}</li>
                            @endif
                        @endforeach
                     </ul>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="900">
                    <ul class="cart_info_list ul_li_block clearfix" data-aos="fade-up" data-aos-delay="300">
                        @foreach($reservation->accessories as $res)
                            @if($loop->even)
                                <li><i class="far fa-check-circle"></i> {{$res->accessory->name}}</li>
                            @endif
                        @endforeach
                     </ul>
                </div>
                </div>
            </div>

            <hr data-aos="fade-up" data-aos-delay="100">

            <ul class="cart_info_list2 ul_li_block clearfix" data-aos="fade-up" data-aos-delay="100">
                <li><strong>Total price:</strong>
                   <span class="float-right">Status:  <span class="badge badge-{{$reservation->isActive()?($reservation->getStatus()=='Incoming'?'warning':'success'):'secondary'}}">{{$reservation->getStatus()}}</span></span>
                    {{$reservation->total_price}}€
                </li>
            </ul>

            <hr data-aos="fade-up" data-aos-delay="100">

        </div>
    </div>

</div>
@endforeach

<div class="d-flex justify-content-center">{{$reservations->links()}}</div>
