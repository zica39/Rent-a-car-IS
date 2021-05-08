@extends('client.layouts.main')
@section('app-title','Rent-a-car reservations')

@section('content')

    @include('client.layouts.breadcrumb',['page' => 'Reservations','path'=>['Home','Our Cars','Reservations']])
    <!-- cart_section - start
			================================================== -->
    <section class="cart_section sec_ptb_100 clearfix">
        <div class="container">
            @include('client.layouts.components.reservations_history')
        </div>
    </section>
    <!-- cart_section - end
    ================================================== -->
@endsection
