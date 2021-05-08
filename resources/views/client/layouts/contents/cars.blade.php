
@include('client.layouts.breadcrumb',['page' => 'Cars','path'=>['Home','Cars']])

<!-- car_section - start
================================================== -->
<div class="car_section sec_ptb_100 clearfix">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">

            @include('client.layouts.components.filter')

            <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                <div class="item_shorting clearfix" >
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <span class="item_available">Available offers {{$cars->total()}}</span>
                        </div>

                        {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <form action="#">
                                <div class="form_item mb-0">
                                    <select name="sort">
                                        <option data-display="Short By">Select A Option</option>
                                        <option value="0" selected>Default Sorthing</option>
                                        <option value="1">Sort by Price</option>
                                        <option value="2">Sort by Seats number</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>--}}
                </div>

               @include('client.layouts.components.sarch_grid')

                <div class="pagination_wrap clearfix" data-aos="fade-up" data-aos-delay="100">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <span class="page_number">Page 1 of {{$cars->lastPage()}}</span>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            {{$cars->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- car_section - end
================================================== -->
