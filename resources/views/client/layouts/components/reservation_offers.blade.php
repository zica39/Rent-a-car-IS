
<div class="reservation_offer_checkbox">
    <h4 class="input_title" data-aos="fade-up" data-aos-delay="800">Your Offer Includes:</h4>
    <div class="row" id="accessories">

        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="900">
            @foreach($accessories as $accessory)
                @if($loop->odd)
                    <div class="checkbox_input">
                        <label for="offer{{$accessory->id}}"><input type="checkbox" data-accessory-id="{{$accessory->id}}" id="offer{{$accessory->id}}"> {{$accessory->name}}</label>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="900">
            @foreach($accessories as $accessory)
                @if($loop->even)
                    <div class="checkbox_input">
                        <label for="offer{{$accessory->id}}"><input type="checkbox" data-accessory-id="{{$accessory->id}}" id="offer{{$accessory->id}}"> {{$accessory->name}}</label>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
</div>
