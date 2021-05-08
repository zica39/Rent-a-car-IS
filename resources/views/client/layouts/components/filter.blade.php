<div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
    <aside class="filter_sidebar sidebar_section" data-bg-color="#F2F2F2">
        <div class="sidebar_header" data-bg-gradient="linear-gradient(90deg, #0C0C0F, #292D45)">
            <h3 class="text-white mb-0">Filters</h3>
        </div>
        <div class="sb_widget">
            <form action="">
                <div class="sb_widget price-range-area clearfix" data-aos="fade-up" data-aos-delay="100">
                    <h4 class="input_title">Price</h4>
                    <div id="slider-range" class="slider-range clearfix"></div>
                    <input class="price-text" type="text" id="amount" name="price" readonly value="{{request('price')}}">
                </div>

                <script>
                    if(@json(request('price'))) {
                        let str = @json(request('price'));
                        let arr = str.split('-');
                        var min = arr[0].substr(1);
                        var max = arr[1].substr(2);
                    }
                </script>

                <div class="sb_widget car_picking" data-aos="fade-up" data-aos-delay="100">

                    <div class="form_item">
                        <h4 class="input_title">Pick A Date</h4>
                        <input min = "{{date('Y-m-d', strtotime(' +1 day'))}}" type="date" name="pickup_date" onchange="update_price(event);" value="{{request('pickup_date')}}">
                    </div>

                    <div class="form_item">
                        <h4 class="input_title">Return Date</h4>
                        <input type="date" name="return_date"  onchange="update_price(event);" value="{{request('return_date')}}">
                    </div>
                </div>

                <div class="sb_widget" data-aos="fade-up" data-aos-delay="100">
                    <h4 class="input_title">Number of passengers:</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox_input">
                                <label for="passengers_radio1"><input type="radio" id="passengers_radio1" name="passengers" value="2" {{request('passengers')=='2'?'checked':''}} > 2</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkbox_input">
                                <label for="passengers_radio2"><input type="radio" id="passengers_radio2" name="passengers" value="5" {{request('passengers')=='5'?'checked':''}}> 5</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkbox_input">
                                <label for="passengers_radio3"><input type="radio" id="passengers_radio3" name="passengers" value="4" {{request('passengers')=='4'?'checked':''}}> 4</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkbox_input">
                                <label for="passengers_radio4"><input type="radio" id="passengers_radio4" name="passengers" value="7" {{request('passengers')=='7'?'checked':''}}> 7 or more</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sb_widget" data-aos="fade-up" data-aos-delay="100">

                    <div class="form_item third">
                        <select name="class">
                            <option data-display="Car Class" value="">Select A Option</option>
                            @foreach($cars_classes as $car_class)
                            <option value="{{$car_class->id}}" {{$car_class->id==request('class')?'selected':''}}>{{$car_class->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--<div class="form_item">
                        <select>
                            <option data-display="Fuel type">Select A Option</option>
                            <option value="1">Gasoline</option>
                            <option value="2">Diesel Fuel</option>
                            <option value="3">Bio-diesel</option>
                            <option value="4">Ethanol</option>
                        </select>
                    </div>--}}

                    <div class="form_item">
                        <select name="is_automatic">
                            <option data-display="Gearbox type" value="">Select A Option</option>
                            <option value="1" {{ request('is_automatic')==1?'selected':''}}>Manual</option>
                            <option value="2" {{ request('is_automatic')==2?'selected':''}}>Automatic</option>
                        </select>
                    </div>

                </div>

                {{--<div class="sb_widget sb_additional_options" data-aos="fade-up" data-aos-delay="100">
                    <h4 class="input_title">Additional Options:</h4>
                    <div class="checkbox_input">
                        <label for="child_seat"><input type="checkbox" id="child_seat"> Child seat</label>
                    </div>

                    <div class="checkbox_input">
                        <label for="air_conditioning"><input type="checkbox" id="air_conditioning"> Air conditioning</label>
                    </div>

                    <div class="checkbox_input">
                        <label for="chauffeur_services"><input type="checkbox" id="chauffeur_services"> Chauffeur services</label>
                    </div>

                    <div class="checkbox_input">
                        <label for="winter_equipment"><input type="checkbox" id="winter_equipment"> Winter Equipment</label>
                    </div>

                    <div class="checkbox_input">
                        <label for="premium_sound_system"><input type="checkbox" id="premium_sound_system"> Premium Sound System</label>
                    </div>
                </div>
--}}
                <hr>

                <div>
                    <button type="submit" class="custom_btn bg_default_red text-uppercase">Apply Filters <img src="{{asset('assets/images/icons/icon_01.png')}}" alt="icon_not_found"></button>
                </div>
            </form>
        </div>
    </aside>
</div>
