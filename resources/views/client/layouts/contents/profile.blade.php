
@include('client.layouts.breadcrumb',['page' => 'Profile','path'=>['Home','Profile']])
<!-- account_section - start
================================================== -->
<section class="account_section sec_ptb_100 clearfix">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">

            <div class="col-lg-4 col-md-8 col-sm-10 col-xs-12">
                <div class="account_tabs_menu clearfix" data-bg-color="#F2F2F2" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="list_title mb_15">Account Details:</h3>
                    <ul class="ul_li_block nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#admin_tab"><i class="fas fa-user"></i> {{auth()->user()->name}}</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#profile_tab"><i class="fas fa-address-book"></i> Booking Profiles</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#history_tab"><i class="fas fa-file-alt"></i> Booking History</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                <div class="account_tab_content tab-content">
                    <div id="admin_tab" class="tab-pane active">
                        <div class="account_info_list" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="list_title mb_30">Account:</h3>
                            <ul class="ul_li_block clearfix">
                                <li><span>Name:</span>{{auth()->user()->name}}</li>
                                <li><span>E-mail:</span>{{auth()->user()->email}}</li>
                                <li><span>Phone Number:</span> {{auth()->user()->phone_number}}</li>
                                <li><span>Country:</span> {{auth()->user()->country->name}}</li>
                                {{--<li><span>Address:</span> 60 Stonybrook Lane Atlanta, GA 30303</li>--}}
                            </ul>
                            <a class="text_btn text-uppercase" href="#!"><span>Change Account Information</span> <img src="assets/images/icons/icon_02.png" alt="icon_not_found"></a>
                        </div>

                        <div id="profile_tab" class="account_info_list" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="list_title mb_30">Booking Profiles:</h3>
                            <ul class="ul_li_block clearfix">
                                <li><span>Profile ID:</span> #{{auth()->user()->id}}</li>
                                <li><span>First reservation:</span> {{auth()->user()->getFirstReservationAttribute()}}</li>
                                <li><span>Last reservation:</span> {{auth()->user()->getLastReservationAttribute()}}</li>
                            </ul>
                        </div>

                        <div id="history_tab" class="account_info_list" data-aos="fade-up" data-aos-delay="500">
                            <h3 class="list_title mb_30">Booking History:</h3>
                            <ul class="ul_li_block clearfix">
                                <li><span>Upcoming Reservations:</span> {{auth()->user()->getIncomingReservationsCount()??'No Reservations Yet'}}</li>
                                <li><span>Active Reservations:</span> {{auth()->user()->getActiveReservationsCount()}}</li>
                                <li><span>Past Rentals:</span>  {{auth()->user()->getPastReservationsCount()}}</li>
                                <li><span>Total Reservations:</span> {{auth()->user()->getTotalReservationsCount()}}</li>
                            </ul>
                            <a class="text_btn text-uppercase" href="/reservation"><span>History</span> <img src="{{asset('assets/images/icons/icon_02.png')}}" alt="icon_not_found"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- account_section - end
================================================== -->
