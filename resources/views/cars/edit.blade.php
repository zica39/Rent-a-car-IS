<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/car">Cars</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h5 class="c-grey-900">Create new user</h5>
                        <div class="mT-30">
                            <form id='create_form' action="/car/{{$car->id}}" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    @csrf
                                    @method('put')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="model">Model</label>
                                            <input type="text" class="form-control" name="model" value="{{$car->model}}" id="model" placeholder="Car model">
                                            @error('model')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="number" class="form-control" name="age" value="{{$car->age}}" id="age" placeholder="Age">
                                            @error('age')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="registration_number">Register No.</label>
                                            <input type="text" class="form-control" name="registration_number" value="{{$car->registration_number}}" id="registration_number" placeholder="Registration No.">
                                            @error('registration_number')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="seats_number">Seats number</label>
                                            <input type="number" class="form-control" name="seats_number" value="{{$car->seats_number}}" id="seats_number" placeholder="Seats number">
                                            @error('seats_number')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="inputState">Car Class</label>
                                            <select name="class_id" id="inputState" class="form-control">
                                                <option selected="selected">Choose...</option>
                                                @foreach($classes as $class)
                                                    <option value="{{$class->id}}" {{$class->id == $car->class_id?'selected':''}}>{{$class->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('class_id')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fuel_type">Fuel type</label>
                                            <input type="text" class="form-control" name="fuel_type" value="{{$car->fuel_type}}" id="fuel_type" placeholder="Fuel type">
                                            @error('fuel_type')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <label for="is_automatic" class="form-check-label">
                                                    <input class="form-check-input" id="is_automatic" name="is_automatic" type="checkbox" {{$car->is_automatic?'checked':''}}> Automatic gearbox</label>
                                                @error('is_automatic')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Seats number</label>
                                            <input type="number" class="form-control" name="price" value="{{$car->price}}" id="price" placeholder="Price">
                                            @error('price')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        {{--<div class="form-group">
                                            <label for="photos">Photos</label>
                                            <input type="file" accept="*/image" class="form-control" name="photos[]"  id="photos">
                                            @error('photos')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                        </div>--}}

                                        <div class="form-group">
                                            <label for="textarea">Notes</label>
                                            <textarea type="phone" rows="4" name="notes" class="form-control" id="textarea" placeholder="Some notes here">{{$car->notes}}</textarea>
                                        </div>

                                        <a href="/car" class="btn btn-secondary float-right ml-1 text-light">Cancel</a>
                                        <button type="submit" form="create_form" class="btn btn-primary float-right">Update</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
