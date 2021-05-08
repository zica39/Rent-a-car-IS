@php
    $reservations = \App\Models\Reservation::query()->where('return_date','>',date('y-m-d'))->where('user_id',auth()->id())->get()->sortDesc();
@endphp

<li class="dropdown">
    <button type="button" class="cart_btn" id="cart_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fal fa-calendar"></i>
            @if(session()->has('notification'))
                <span class="cart_counter bg_default_red">1</span>
                @php session()->forget('notification'); @endphp
            @endif
    </button>
    <div class="cart_dropdown rotors_dropdown dropdown-menu" aria-labelledby="cart_dropdown" style="width:400px;">
        <h4 class="wrap_title">Reservations: ({{$reservations->count()}})</h4>
        <ul class="cart_items_list ul_li_block clearfix" style="max-height: 400px;overflow: auto">
            @foreach($reservations as $reservation)
                <li>
                    <a href="/reservation/{{$reservation->id}}" class="d-flex">
                <div class="item_image">
                    <img src="{{asset($reservation->car->getPhoto())}}" alt="image_not_found">
                </div>
                <div class="item_content">
                    <h4 class="item_title">{{$reservation->car->model}} </h4>
                    <span class="item_price">{{$reservation->total_price}}€  <span class="badge {{$reservation->getStatus()=='Active'?'badge-success':'badge-primary'}}">{{$reservation->getStatus()}}</span></span>

                </div>
{{--                <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>--}}
                    </a>
                </li>
            @endforeach
        </ul>
        <ul class="btns_group ul_li_block clearfix">
            <li><a href="/reservation" class="custom_btn bg_default_black text-uppercase">History <img src="{{asset('assets/images/icons/icon_01.png')}}" alt="icon_not_found"></a></li>
        </ul>
    </div>
</li>





