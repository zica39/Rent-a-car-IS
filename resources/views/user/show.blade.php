


<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/user">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://randomuser.me/api/portraits/men/10.jpg" alt="Admin" class="rounded " width="200">
                            <div class="mt-3">
                                <p class="text-muted font-size-sm">{{$user->name}}</p>
                                <a href="/user/{{$user->id}}/edit" class="btn btn-primary"><i class="ti-pencil"></i> Edit</a>
                                <a href="/calendar?user={{$user->id}}" class="btn btn-outline-primary"><i class="ti-calendar"></i> Reservations</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Profile ID</h6>
                            <span class="text-secondary">#{{$user->id}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">First reservation:</h6>
                            <span class="text-secondary">{{$user->getFirstReservationAttribute()}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Last reservation</h6>
                            <span class="text-secondary">{{$user->getLastReservationAttribute()}}</span>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->phone_number}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Country</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->country->name}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3">Booking history</h6>
                                <ul class="ul_li_block clearfix">
                                    <li><span>Upcoming Reservations:</span> {{$user->getIncomingReservationsCount()??'No Reservations Yet'}}</li>
                                    <li><span>Active Reservations:</span> {{$user->getActiveReservationsCount()}}</li>
                                    <li><span>Past Rentals:</span>  {{$user->getPastReservationsCount()}}</li>
                                    <li><span>Total Reservations:</span> {{$user->getTotalReservationsCount()}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Notes</h6>
                                <p>{{$user->notes}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
