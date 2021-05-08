<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">User Tables</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="masonry-item col-md-6 offset-3">
                    <div class="bgc-white p-20 bd">
                        <h5 class="c-grey-900">Create new reservation</h5>
                        <div class="mT-30">
                            <form id='create_form' action="/calendar" method="post" autocomplete="off">
                                @csrf
                                @method('post')
                                <input type="hidden" name="user" value="{{$user->id}}">
                                <input type="hidden" name="car" value="{{$car->id}}">

                                <div class="form-group">
                                    <label for="user_name">User</label>
                                    <input type="text" disabled class="form-control" value="{{$user->name}}" id="user_name" placeholder="User">
                                </div>

                                <div class="form-group">
                                    <label for="car_name">Car</label>
                                    <input type="text" disabled class="form-control" value="{{$car->model}}" id="car_name" placeholder="Car">
                                </div>

                                <div class="form-group">
                                    <label class="fw-500">Period</label>
                                    <div class="timepicker-input input-icon form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon bgc-white bd bdwR-0"><i class="ti-calendar"></i></div>
                                            <input name="pickup_date" value="{{old('pickup_date')??request('pickup_date')}}" type="text" class="form-control bdc-grey-200 start-date" placeholder="pickup date" data-provide="datepicker">
                                            <input name="pickup_time" value="{{old('pickup_time')}}" type="time" class="form-control bdc-grey-200" placeholder="pickup time" >
                                            <input name="return_date" value="{{old('return_date')??request('return_date')}}" type="text" class="form-control bdc-grey-200 start-date" placeholder="return date" data-provide="datepicker">
                                            <input name="return_time" type="time" value="{{old('return_time')}}" class="form-control bdc-grey-200" placeholder="pickup time" >
                                            @error('pickup_date')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                            @error('return_date')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                            @error('pickup_time')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                            @error('return_time')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                            @if(session('error'))<span class="d-block invalid-feedback">{{session('error')}}</span> @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="fw-500" for="inputState">Locations</label>
                                    <div class="timepicker-input input-icon form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon bgc-white bd bdwR-0"><i class="ti-map"></i></div>

                                            <select name="pickup_location" id="inputState" class="form-control">
                                                <option selected="selected">Pickup location</option>
                                                @foreach($locations as $location)
                                                    <option value="{{$location->id}}" {{$location->id == old('pickup_location')?'selected':''}}>{{$location->name}}</option>
                                                @endforeach
                                            </select>

                                            <select name="return_location" id="inputState" class="form-control">
                                                <option selected="selected">Return location</option>
                                                @foreach($locations as $location)
                                                    <option value="{{$location->id}}" {{$location->id == old('return_location')?'selected':''}}>{{$location->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('pickup_location')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                            @error('return_location')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="accessories">Accessories</label>
                                    <select multiple size="5" name="accessories[]" id="accessories" class="form-control">
                                        <option selected="selected">None</option>
                                        @foreach($accessories as $accessory)
                                            <option value="{{$accessory->id}}" {{$accessory->id == old('return_location')?'selected':''}}>{{$accessory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <button type="submit" form="create_form" class="btn btn-primary float-right" >Create</button>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
