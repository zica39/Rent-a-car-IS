@include('client.layouts.breadcrumb',['page' => 'Car','path'=>['Home','Our Cars','Car']])

<!-- details_section - start
			================================================== -->
<div class="details_section sec_ptb_100 pb-0 clearfix">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">

            @include('client.layouts.components.filter')

            @include('client.layouts.components.car_details')

        </div>
    </div>
</div>
<!-- details_section - end
================================================== -->


<!-- cars_section - start
================================================== -->
<section class="cars_section sec_ptb_100 clearfix">
    @include('client.layouts.components.carosel')
</section>
<!-- cars_section - end
================================================== -->
