<!-- main body - start
================================================== -->

    @include('client.layouts.components.home_slider')


 @include('client.layouts.components.search_box')


    <!-- feature_section - start
    ================================================== -->
    <section class="feature_section sec_ptb_150 clearfix">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                    <div class="section_title mb_60 text-center" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="title_text mb_15">
                            <span>Featured Vehicles</span>
                        </h2>
                        <p class="mb-0">
                            Mauris cursus quis lorem sed cursus. Aenean aliquam pellentesque magna, ut dictum ex pellentesque
                        </p>
                    </div>
                </div>
            </div>

            <ul class="button-group filters-button-group ul_li_center mb_30 clearfix" data-aos="fade-up" data-aos-delay="300">
                <li><button class="button active" data-filter="*">All</button></li>
                <li><button class="button" data-filter=".sedan">Sedan</button></li>
                <li><button class="button" data-filter=".sports">Sports</button></li>
                <li><button class="button" data-filter=".luxury">Luxury</button></li>
            </ul>

            @include('client.layouts.components.car_grid')

            <div class="abtn_wrap text-center clearfix" data-aos="fade-up" data-aos-delay="100">
                <a class="custom_btn bg_default_red btn_width text-uppercase" href="#!">Book A Car <img src="assets/images/icons/icon_01.png" alt="icon_not_found"></a>
            </div>

        </div>
    </section>
    <!-- feature_section - end
    ================================================== -->
