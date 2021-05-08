<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">Reservations / Table view</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">
                    <button class="btn btn-primary" onclick="switchToCalendar()">
                        <i class="fa fa-calendar"></i> Calendar view
                    </button>

                    <button {{request('user')&&request('car')?'': 'disabled'}} form="filter_form" formaction="/calendar/create" class="ml-1 btn btn-success">
                        <i class="fa fa-plus"> Add New Reservation</i>
                    </button>
                    <form id="filter_form" autocomplete="off">
                        <input type="hidden" name="user" value="{{request('user')}}">
                        <input type="hidden" name="car" value="{{request('car')}}">
                        <input type="hidden" name="status" value="{{request('status')}}">
                    </form>
                </h4>
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th id="reservation_id">Id</th>
                        <th>User</th>
                        <th>Car</th>
                        <th>Pickup date</th>
                        <th>Return date</th>
                        <th>Pickup location</th>
                        <th>Return location</th>
                        <th>Total price</th>
                        <th>Accessories</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    {{--<tfoot>
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Car</th>
                        <th>Pickup date</th>
                        <th>Return date</th>
                        <th>Pickup location</th>
                        <th>Return location</th>
                        <th>Total price</th>
                        <th>Accessories</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>--}}
                    <tbody>
                    @foreach($reservations as $reservation)

                        @if(request('status'))
                            @if(request('status') != $reservation->getStatus()) @continue @endif
                        @endif
                        <tr>
                            <td>{{$reservation->id}}</td>
                            <td><a href="/user/{{$reservation->user->id}}">{{$reservation->user->name}}</a></td>
                            <td><a a href="/car/{{$reservation->car->id}}">{{$reservation->car->model}}</a></td>
                            <td>{{$reservation->pick_up_date}}  {{$reservation->pick_up_time}}</td>
                            <td>{{$reservation->return_date}}  {{$reservation->return_time}}</td>
                            <td>{{$reservation->puLocation()->name}}</td>
                            <td>{{$reservation->retLocation()->name}}</td>
                            <td>{{$reservation->total_price}}€</td>
                            <td>
                                <ul>
                                @foreach($reservation->accessories as $accessory)
                                    <li>{{$accessory->accessory->name}}</li>
                                @endforeach
                                </ul>
                            </td>
                            <td>{{$reservation->getStatus()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('reservation_id').click();
    });

    function  switchToCalendar(){
        window.location.search=window.location.search.replace('&view=table','');
        window.location.search=window.location.search.replace('view=table','');
    }
</script>
