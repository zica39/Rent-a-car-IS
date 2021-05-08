<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/user">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="masonry-item col-md-6 offset-3">
                    <div class="bgc-white p-20 bd">
                        <h5 class="c-grey-900">Edit user</h5>
                        <div class="mT-30">
                            <form action="/user/{{$user->id}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" name="email" value="{{$user->email}}" class="form-control" id="inputEmail4" placeholder="Email">
                                        @error('email')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                    {{--<div class="form-group col-md-6">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                                        @error('password')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                    </div>--}}
                                </div>
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name" placeholder="Full name">
                                    @error('name')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="phone" class="form-control" value="{{$user->phone_number}}" name="phone" id="phone" placeholder="+382 ...">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Country</label>
                                    <select name="country" id="inputState" class="form-control">
                                        <option selected="selected">Choose...</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{$country->id == $user->country_id?'selected':''}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('country')<span class="d-block invalid-feedback">{{$message}}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="textarea">Notes</label>
                                    <textarea type="phone" name="notes" class="form-control" id="textarea" placeholder="Some notes here">{{$user->notes}}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
