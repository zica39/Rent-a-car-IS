<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Users /</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">
                    <a href="user/create" class="btn btn-primary" >
                        <i class="ti-plus"></i> Add New User
                    </a>
                </h4>
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th id="user_id">Id</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Tel</th>
                        <th><abbr title="First reservation date">First-RD</abbr></th>
                        <th><abbr title="Last reservation date">Last-RD</abbr></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    {{--<tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Tel</th>
                        <th>First-RD</th>
                        <th>Last-RD</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>--}}
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="/user/{{$user->id}}" class="{{$user->is_admin?'text-danger':''}}" title="{{$user->is_admin?'Sistem Admin':''}}">{{$user->name}}</a></td>
                            <td>{{$user->country->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td style="min-width: 130px;">{{$user->getFirstReservationAttribute()}}</td>
                            <td style="min-width: 130px;">{{$user->getLastReservationAttribute()}}</td>
                            <td> <a href="/user/{{$user->id}}/edit" class="btn bdrs-2 mR-3 cur-p"><i class="ti-pencil"></i></a></td>
                            <td> <form action="/user/{{$user->id}}" method="post">@csrf @method('delete')<button {{$user->is_admin?'disabled':''}} class="btn bdrs-2 mR-3 cur-p" onclick="if(!confirm('Are you sure?'))event.preventDefault();"><i class="ti-trash"></i></button></form></td>
                            <td> <a href="/calendar?user={{$user->id}}{{request('car')?'&car='.request('car'):''}}" title='Reservations' class="btn bdrs-2 mR-3 cur-p"><i class="ti-calendar"></i></a></td>
                            <td> <a href="/car?user={{$user->id}}" title='Link to cars' class="btn bdrs-2 mR-3 cur-p"><i class="ti-link"></i></a></td>
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
        document.getElementById('user_id').click();
    });
</script>
