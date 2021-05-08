
@include('client.layouts.breadcrumb',['page' => 'Contact Us','path'=>['Home','Contact Us']])


<!-- google_map_section - start
			================================================== -->
<div class="google_map_section clearfix" data-aos="fade-up" data-aos-delay="100">
    <div id="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="12" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia." data-mlat="40.701083" data-mlon="-74.1522848">
    </div>
</div>
<!-- google_map_section - end
================================================== -->

<!-- contact_section - start
================================================== -->
<section class="contact_section clearfix">
    <div class="container">
        <div class="contact_details_wrap text-white" data-bg-color="#1F2B3E" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-lg-between">
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="image_area">
                        <div class="brand_logo mb_15">
                            <a href="index.html">
                                <img src="assets/images/logo/logo_01_1x.png" srcset="assets/images/logo/logo_01_2x.png 2x" alt="logo_not_found">
                            </a>
                        </div>
                        <p class="mb_30">
                            Mauris dignissim condimentum viverra. Curabitur blandit eu justo id porta
                        </p>
                        <div class="image_wrap">
                            <img src="assets/images/about/img_02.jpg" alt="image_not_found">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="content_area">
                        <h3 class="item_title text-white mb_30">Contact Details:</h3>
                        <ul class="ul_li_block mb_30 clearfix">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                Unit 9, Manor Industrial Estate, Lower Wash Lane, Warrington, WA4
                            </li>
                            <li><i class="fas fa-clock"></i> WH: 8:00am - 9:30pm</li>
                            <li><i class="fas fa-phone"></i> 01967 411232</li>
                            <li><i class="fas fa-envelope"></i> rotorseml@eml.fr</li>
                        </ul>
                        <form action="#">
                            <div class="form_item mb-0">
                                <input id="search_input" type="search" name="search" placeholder="Search">
                                <label for="search_input" class="input_icon"><i class="fal fa-search"></i></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact_section - end
================================================== -->

<!-- contact_form_section - start
================================================== -->
<section class="contact_form_section sec_ptb_100 clearfix">
    <div class="container">

        <div class="section_title mb_60 text-center" data-aos="fade-up" data-aos-delay="100">
            <h2 class="title_text mb-0">
                <span>Send Us a Message</span>
            </h2>
        </div>

        @if(session('status'))
            <p class="text-success text-weight-bold text-center">{{session('status')}}!!!</p>
            @else
        <form id="contact_form" action="contact_mail" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form_item" data-aos="fade-up" data-aos-delay="100">
                        <input type="text" name="full_name" placeholder="Full Name">
                        @error('full_name')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form_item" data-aos="fade-up" data-aos-delay="300">
                        <input type="email" name="email" placeholder="E-mail">
                        @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form_item" data-aos="fade-up" data-aos-delay="200">
                        <input type="text" name="subject" placeholder="Subject">
                        @error('subject')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form_item" data-aos="fade-up" data-aos-delay="400">
                        <input type="tel" name="phone" placeholder="Phone Number">
                    </div>
                </div>
            </div>
            <div class="form_item" data-aos="fade-up" data-aos-delay="500">
                <textarea name="message" placeholder="Leave Your Message"></textarea>
                @error('message')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="abtn_wrap text-center clearfix" data-aos="fade-up" data-aos-delay="600">
                <button type="submit" value="submit" class="custom_btn btn_width bg_default_red text-uppercase">Send a Message <img src="assets/images/icons/icon_01.png" alt="icon_not_found"></button>
            </div>
        </form>
        @endif
    </div>
</section>
<!-- contact_form_section - end
================================================== -->
