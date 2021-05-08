
@extends('client.layouts.main')
@section('app-title','Rent-a-car reservation')

@section('content')

    @include('client.layouts.breadcrumb',['page' => 'Reservation','path'=>['Home','Our Cars','Reservation']])
    <!-- reservation_section - start
================================================== -->
    <section class="reservation_section sec_ptb_100 clearfix">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">

                @include('client.layouts.components.reserved_car')

                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                    <div class="reservation_form">
                        <form id='reservation_form' action="/reservation" method="post">

                            @csrf
                            @method('post')
                            <input type="hidden" id='car' name="car" value="{{$car->id}}">
                            <input type="hidden" name="accessories" id="accessories">

                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 third">
                                    <div class="form_item" data-aos="fade-up" data-aos-delay="100">
                                        <h4 class="input_title">Pick Up Location</h4>
                                        @error('pickup_location')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        <div class="position-relative">
                                            @include('client.layouts.components.locations_select',['name'=>'pickup_location'])
                                            <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form_item" data-aos="fade-up" data-aos-delay="200">
                                        <h4 class="input_title">Pick A Date</h4>
                                        @error('pickup_date')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        <input min = "{{date('Y-m-d', strtotime(' +1 day'))}}" type="date" name="pickup_date" value="{{old('pickup_date')}}" onchange="update_price(event);">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form_item" data-aos="fade-up" data-aos-delay="300">
                                        <h4 class="input_title">Time</h4>
                                        @error('pickup_time')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        <input type="time" name="pickup_time" value="{{old('pickup_time')}}">
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form_item first" data-aos="fade-up" data-aos-delay="400">
                                        <h4 class="input_title">Return Location</h4>
                                        @error('return_location')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        <div class="position-relative">
                                            @include('client.layouts.components.locations_select',['name'=>'return_location'])
                                            <label for="location_three" class="input_icon"><i class="fas fa-map-marker-alt"></i></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form_item" data-aos="fade-up" data-aos-delay="500">
                                        <h4 class="input_title">Return Date</h4>
                                        @error('return_date')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        <input disabled min1 = "{{date('Y-m-d', strtotime(' +2 day'))}}" type="date" name="return_date"  value="{{old('return_date')}}" onchange="update_price(event);">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form_item" data-aos="fade-up" data-aos-delay="600">
                                        <h4 class="input_title">Time</h4>
                                        @error('return_time')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        <input type="time" name="return_time" value="{{old('return_time')}}">
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-0" data-aos="fade-up" data-aos-delay="700">

                            @include('client.layouts.components.reservation_offers')

                            <hr class="mt-0" data-aos="fade-up" data-aos-delay="100">

                            <div class="reservation_customer_details">

                                <div class="row align-items-center justify-content-lg-between">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                                        <ul class="cart_info_list2 ul_li_block clearfix" data-aos="fade-up" data-aos-delay="100">
                                            <li><strong>Car rental duration:</strong> <span id="days">0</span> days</li>
                                            <li><strong>Rental Price:</strong> <span id="car_price">{{$car->price}}</span>€/day</li>
                                            <li><strong><u>Subtotal:</u></strong>  <b id="total">0</b>€</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="300">
                                        <button type="submit" id="submit_reservation" disabled class="custom_btn bg_default_red text-uppercase"><span id="spinner" class="d-none"> <i class="fas fa-circle-notch fa-spin "></i></span> Reservation Now <img src="{{asset('assets/images/icons/icon_01.png')}}" alt="icon_not_found"> </button>
                                        <span id="message" class="d-block invalid-feedback"> {{session('error')??''}}</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- reservation_section - end
    ================================================== -->
@endsection

