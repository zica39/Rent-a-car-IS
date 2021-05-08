@include('client.layouts.breadcrumb',['page' => 'Gallery','path'=>['Home','Gallery']])

<!-- gallery_section - start
			================================================== -->
<section class="gallery_section sec_ptb_100 clearfix">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
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

        <div class="pagination_wrap clearfix">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <span class="page_number" data-aos="fade-up" data-aos-delay="100">Page {{request('page')??1}} of {{$cars->lastPage()}}</span>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    {{$cars->links()}}
                </div>
            </div>
        </div>

    </div>
</section>
<!-- gallery_section - end
================================================== -->


<!-- search_section - start
================================================== -->
<section class="search_section sec_ptb_100 clearfix" data-bg-color="#161829">
    <div class="container">
        <div class="section_title text-center mb_60">
            <h2 class="title_text text-white mb-0" data-aos="fade-up" data-aos-delay="100"><span>Find the right car for every occasion</span></h2>
        </div>

       @include('client.layouts.components.search_box')
    </div>

    @include('client.layouts.components.carosel')
</section>
<!-- search_section - end
================================================== -->
