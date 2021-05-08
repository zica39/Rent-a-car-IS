<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/car">Cars</a></li>
                <li class="breadcrumb-item active" aria-current="page">Car Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center img-hover-zoom--quick-zoom">
                            <img src="{{asset($car->getPhoto())}}" alt="Admin" class="rounded " width="200">
                            <div class="mt-3">
                                <p class="text-muted font-size-sm">{{$car->model}}</p>
                                <a href="/car/{{$car->id}}/edit" class="btn btn-primary"><i class="ti-pencil"></i> Edit</a>
                                <a href="/calendar?car={{$car->id}}" class="btn btn-outline-primary"><i class="ti-calendar"></i> Reservations</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Gearbox Type</h6>
                            <span class="text-secondary">{{$car->is_automatic?'Automatic':'Manual'}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Fuel Type</h6>
                            <span class="text-secondary">{{$car->fuel_type}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Price/Day</h6>
                            <span class="text-secondary">{{$car->price}}EUR</span>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Model</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$car->model}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Age</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$car->age}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Class</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$car->class->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Seats Number</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$car->seats_number}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Registration No.</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$car->registration_number}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3">Photos  <button  class="btn btn-sm btn-outline-success ml-1" data-toggle="modal" data-target="#photoEditor"> <i class="ti-pencil"></i> Edit</button></h6>

                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($car->getPhotos() as $photo)
                                            <div class="carousel-item {{$loop->first?'active':''}}">
                                                <img class="d-block w-100" src="{{asset($photo)}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Notes</h6>
                                <p>{{$car->notes}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="photoEditor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Order of Images in Photo Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="gallery">


                        <ul id="image-list" >
                            @foreach($car->getPhotos() as $photo)
                            <img src="{{asset($photo)}}" alt="{{$photo}}" width="100" height="100"></li>';
                            @endforeach
                        </ul>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    var images = @json($car->getPhotos());
</script>
