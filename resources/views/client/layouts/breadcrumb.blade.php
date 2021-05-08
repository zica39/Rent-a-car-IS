<!-- breadcrumb_section - start
			================================================== -->
<section class="breadcrumb_section text-center clearfix mt-5">
    <div class="page_title_area has_overlay d-flex align-items-center clearfix" data-bg-image="{{asset('assets/images/breadcrumb/bg_01.jpg')}}">
        <div class="overlay"></div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="page_title text-white mb-0">{{$page}}</h1>
        </div>
    </div>
    <div class="breadcrumb_nav clearfix" data-bg-color="#F2F2F2">
        <div class="container">
            <ul class="ul_li clearfix">
                @foreach($path as $a)
                    @if($a == 'home')  <li><a href="index.html">Home</a></li>
                    @else
                        <li>{{$a}}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb_section - end
================================================== -->
