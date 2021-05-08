<!-- search_section - start
    ================================================== -->
<section class="search_section clearfix">
    <div class="container">
        <div class="advance_search_form2" data-bg-color="#161829" data-aos="fade-up" data-aos-delay="100">
            <form action="/cars">
                <div class="row align-items-end">
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="form_item">
                            <div class="position-relative">
                                <div class="form_item">
                                    <div class="form_item">
                                        <h4 class="input_title text-white">Pick A Date</h4>
                                        <input min = "{{date('Y-m-d', strtotime(' +1 day'))}}" type="date" name="pickup_date" onchange="update_price(event);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="form_item">
                            <h4 class="input_title text-white">Return Date</h4>
                            <input type="date" name="return_date"  onchange="update_price(event);">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="price-range-area clearfix">
                            <h4 class="input_title text-white">Price</h4>
                            <div id="slider-range" class="slider-range clearfix"></div>
                            <input class="price-text" type="text"  name="price" id="amount" readonly>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <button type="submit" class="custom_btn bg_default_red text-uppercase">Find A Car <img src="assets/images/icons/icon_01.png" alt="icon_not_found"></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- search_section - end
================================================== -->
