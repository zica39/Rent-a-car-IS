<!-- mobile menu - start
    ================================================== -->
<div class="sidebar-menu-wrapper">
    <div class="mobile_sidebar_menu">
        <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

        <div class="about_content mb_60">
            <div class="brand_logo mb_15">
                <a href="index.html">
                    <img src="{{asset('assets/images/logo/logo_01_1x.png')}}" srcset="{{asset('assets/images/logo/logo_01_2x.png 2x')}}" alt="logo_not_found">
                </a>
            </div>
            {{--<p class="mb-0">
                Nullam id dolor auctor, dignissim magna eu, mattis ante. Pellentesque tincidunt, elit a facilisis efficitur, nunc nisi scelerisque enim, rhoncus malesuada est velit a nulla. Cras porta mi vitae dolor tristique euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit
            </p>--}}
        </div>

        <div class="menu_list mb_60 clearfix">
            <h3 class="title_text text-white">Menu List</h3>
            <ul class="ul_li_block clearfix">
                <li class="{{Request::path()=='home'?'active':''}}"><a href="{{Request::path()=='home'?'#!':'/home'}}">Home</a></li>
                <li class="{{Request::path()=='cars'?'active':''}}"><a href="{{Request::path()=='cars'?'#!':'/cars'}}">Our Cars</a></li>
                <li class="{{Request::path()=='gallery_view'?'active':''}}"><a href="{{Request::path()=='gallery_view'?'#!':'/gallery_view'}}">Gallery</a></li>
                <li class="{{Request::path()=='about'?'active':''}}"><a href="{{Request::path()=='about'?'#!':'/about'}}">About</a></li>
                <li class="{{Request::path()=='contact'?'active':''}}"><a href="{{Request::path()=='contact'?'#!':'/contact'}}">Contact Us</a></li>
            </ul>
        </div>

        <div class="booking_car_form">
            <h3 class="title_text text-white mb-2">Book A Car</h3>
            <p class="mb_15">
                Are you looking for cheap car rental? Search right here!
            </p>
            <form action="/cars">
                {{--<div class="form_item">
                    <h4 class="input_title text-white">Pick A Date</h4>
                    <input min = "{{date('Y-m-d', strtotime(' +1 day'))}}" type="date" name="pickup_date" onchange="update_price(event);">
                </div>
                <div class="form_item">
                    <h4 class="input_title text-white">Return Date</h4>
                    <input type="date" name="return_date"  onchange="update_price(event);">
                </div>--}}
                <button type="submit" class="custom_btn bg_default_red btn_width text-uppercase">Find A Car <img src="{{asset('assets/images/icons/icon_01.png')}}" alt="icon_not_found"></button>
            </form>
        </div>

    </div>
    <div class="overlay"></div>
</div>
<!-- mobile menu - end
================================================== -->
