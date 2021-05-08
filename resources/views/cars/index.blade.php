<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Cars /</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">
                    <a href="car/create" class="btn btn-primary" >
                        <i class="ti-plus"></i> Add New Car
                    </a>
                </h4>
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <td id="car_id">Id</td>
                        <th>Model</th>
                        <th>Class</th>
                        <th>Age</th>
                        <th>Seats No</th>
                        <th>Register No.</th>
                        <th>Price/Day</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    {{--<tfoot>
                    <tr>
                        <td>Id</td>
                        <th>Model</th>
                        <th>Class</th>
                        <th>Age</th>
                        <th>Seats No</th>
                        <th>Register No.</th>
                        <th>Price/Day</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>--}}
                    <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td>{{$car->id}}</td>
                            <td class="hover_img"><a href="/car/{{$car->id}}">{{$car->model}} <span><img src="{{asset($car->getPhoto())}}" alt="image" height="100" /></span></a></td>
                            <td>{{$car->class->name}}</td>
                            <td>{{$car->age}}</td>
                            <td>{{$car->seats_number}}</td>
                            <td>{{$car->registration_number}}</td>
                            <td>{{$car->price}}€</td>
                            <td> <a href="/car/{{$car->id}}/edit" title="Edit" class="btn bdrs-2 mR-3 cur-p"><i class="ti-pencil"></i></a></td>
                            <td> <form action="/car/{{$car->id}}" title="Delete" method="post">@csrf @method('delete')<button class="btn bdrs-2 mR-3 cur-p" onclick="if(!confirm('Are you sure?'))event.preventDefault();"><i class="ti-trash"></i></button></form></td>
{{--                            <td> <a href="/car/{{$car->id}}" class="btn bdrs-2 mR-3 cur-p"><i class="ti-eye"></i></a></td>--}}
                            <td> <a href="/calendar?car={{$car->id}}{{request('user')?'&user='.request('user'):''}}" title='Reservations' class="btn bdrs-2 mR-3 cur-p"><i class="ti-calendar"></i></a></td>
                            <td> <a href="/user?car={{$car->id}}" title='Reservations' class="btn bdrs-2 mR-3 cur-p"><i class="ti-link"></i></a></td>
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
        document.getElementById('car_id').click();
    });
</script>
