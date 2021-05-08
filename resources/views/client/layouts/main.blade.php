<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('app-title')</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favourite_icon.png') }}">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- icon - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">

    <!-- animation - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/aos.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">

    <!-- carousel - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}">

    <!-- popup - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css')}}">

    <!-- select options - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/nice-select.css')}}">

    <!-- pricing range - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.css')}}">

    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

    <!-- chat - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chat.css')}}">

</head>


<body>

@include(('client.layouts.loader'))

@include('client.layouts.header')


<main class="mt-0">
    @include('client.layouts.mobile_menu')
    @yield('content')
</main>

@include('client.layouts.footer')

@auth
@include('client.layouts.components.chat')
@endauth

<!-- fraimwork - jquery include -->
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- animation - jquery include -->
<script src="{{asset('assets/js/aos.js')}}"></script>
<script src="{{asset('assets/js/parallaxie.js')}}"></script>

<!-- carousel - jquery include -->
<script src="{{asset('assets/js/slick.min.js')}}"></script>

<!-- popup - jquery include -->
<script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>

<!-- select ontions - jquery include -->
<script src="{{asset('assets/js/nice-select.min.js')}}"></script>

<!-- isotope - jquery include -->
<script src="{{asset('assets/js/isotope.pkgd.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>

<!-- google map - jquery include -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
<script src="{{asset('assets/js/gmaps.min.js')}}"></script>

<!-- pricing range - jquery include -->
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>

<!-- counter - jquery include -->
<script src="{{asset('assets/js/waypoint.js')}}"></script>
<script src="{{asset('assets/js/counterup.min.js')}}"></script>

<!-- contact form - jquery include -->
<script src="{{asset('assets/js/validate.js')}}"></script>

<!-- mobile menu - jquery include -->
<script src="{{asset('assets/js/mCustomScrollbar.js')}}"></script>

<!-- custom - jquery include -->
<script src="{{asset('assets/js/custom.js')}}"></script>

@auth
<script>
    const userName = @json(auth()->user()->name);
    const userId = @json(auth()->user()->id);
    const csrf = "{{ csrf_token() }}";

</script>
<!-- simple chat include -->
<script src="{{asset('assets/js/chat.js')}}"></script>
@endauth

</body>
</html>

