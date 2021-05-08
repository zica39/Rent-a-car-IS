<div class="container-fluid">
{{--    <h4 class="c-grey-900 mT-10 mB-30">Reservations / table view</h4>--}}
    <h4 class="c-grey-900 mB-20">
        <button class="btn btn-primary" onclick="window.location.search+='&view=table'">
            <i class="fa fa-table"></i> Table View
        </button>

        <button {{request('user')&&request('car')?'': 'disabled'}} form="filter_form" formaction="/calendar/create" class="ml-1 btn btn-success">
            <i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title=""> Add New Reservation</i>
        </button>
    </h4>
    <div class="row">
        <div class="col-md-4">
            <div class="bdrs-3 ov-h bgc-white bd">
                <div class="bgc-deep-purple-500 ta-c p-10">
                    <h3 class="c-white">Reservations</h3>

                        <h4 class="fw-300 mB-5 lh-1 c-white">For user: {{$user->name??'All'}}</span></h4>
                        <h4 class="fw-300 mB-5 lh-1 c-white">For cars: {{$car->model??'All'}}</span></h4>
                        <h4 class="fw-300 mB-5 lh-1 c-white">With status:
                            <select form="filter_form" name="status" onchange="this.form.submit();" style="font-size:15px;height: 30px;vertical-align: center">
                                <option selected value="">All</option>
                                <option {{request('status')=='Active'?'selected':''}} value="Active">Active</option>
                                <option {{request('status')=='Incoming'?'selected':''}} value="Incoming">Incoming</option>
                                <option {{request('status')=='Past'?'selected':''}}  value="Past">Past</option>
                            </select>
                        </h4>
                </div>
                <form id="filter_form" autocomplete="off">
                    <div class="input-group" style="border:1px solid #673ab7">
                        <input type="hidden" name="user" value="{{request('user')}}">
                        <input type="hidden" name="car" value="{{request('car')}}">

                        <div class="input-group-addon bgc-white bd bdwR-0"><i class="ti-calendar"></i></div>
                        <input type="text" name="pickup_date" class="form-control bdc-grey-200 start-date" placeholder="Date from" data-provide="datepicker" value="{{request('pickup_date')}}">
                        <input type="text" name="return_date" class="form-control bdc-grey-200 start-date" placeholder="Date to" data-provide="datepicker" value="{{request('return_date')}}">
                        <button class="btn btn-primary cur-p rounded-0" data-dismiss="modal"><i class="ti-filter">Filter</i></button>

                    </div>
                </form>
                <div class="pos-r">
{{--                    <button type="button" class="mT-nv-50 pos-a r-10 t-2 btn cur-p bdrs-50p p-0 w-3r h-3r btn-warning"><i class="ti-plus"></i></button>--}}
                    <ul class="m-0 p-0 mT-20">
                        @foreach($reservations as $reservation)

                            @if(request('status'))
                                @if(request('status') != $reservation->getStatus()) @continue @endif
                            @endif

                            <li class="bdB peers ai-c jc-sb fxw-nw">
                                <a class="td-n p-20 peers fxw-nw mR-20 peer-greed c-grey-900" href="javascript:void(0);" >
                                    <div class="peer mR-15" data-toggle="tooltip" data-placement="top" title="{{$reservation->getStatus()}} From:{{$reservation->pick_up_time}} To:{{$reservation->return_time}}"><i class="fa fa-fw fa-clock-o c-{{$reservation->getStatus()=='Past'?'grey':($reservation->getStatus()=='Incoming'?'yellow':'green')}}-500"></i></div>
                                    <div class="peer overflow-auto mh-100">
                                        User: <span class="fw-600">{{$reservation->user->name}}</span><br>
                                        Car: <span class="fw-600">{{$reservation->car->model}}</span>
                                        <div class="c-grey-600">From: <span class="c-grey-700">{{$reservation->pick_up_date}}</span><i>  ({{$reservation->puLocation()->name}})</i></div>
                                        <div class="c-grey-600">To: <span class="c-grey-700">{{$reservation->return_date}}</span><i> ({{$reservation->retLocation()->name}})</i></div>
                                        Tota price: <span class="fw-600"><i>{{$reservation->total_price}}€</i></span>
                                    </div>
                                </a>
                                <div class="peers mR-15">
                                    <div class="peer"><a href="javascript:void(0);" data-accessories="{{$reservation->getAccessories()}}" data-toggle="modal" data-target="#calendar-edit" onclick="openAccessoriesModal.call(this,event)" class="td-n c-deep-purple-500 cH-blue-500 fsz-md p-5"><i class="ti-package"></i></a></div>
                                    <div class="peer"><form method="post" action="/calendar/{{$reservation->id}}">@method('delete') @csrf</form><a href="" onclick="event.preventDefault();this.previousElementSibling.submit();" class="td-n c-red-500 cH-blue-500 fsz-md p-5"><i class="ti-trash"></i></a></div>
                                </div>
                            </li>
                        @endforeach


                        {{-- <li class="bdB peers ai-c jc-sb fxw-nw">
                             <a class="td-n p-20 peers fxw-nw mR-20 peer-greed c-grey-900" href="javascript:void(0);" data-toggle="modal" data-target="#calendar-edit">
                                 <div class="peer mR-15"><i class="fa fa-fw fa-clock-o c-blue-500"></i></div>
                                 <div class="peer"><span class="fw-600">All Day Event</span>
                                     <div class="c-grey-600"><span class="c-grey-700">Nov 01 - </span><i>Website Development</i></div>
                                 </div>
                             </a>
                             <div class="peers mR-15">
                                 <div class="peer"><a href="" class="td-n c-deep-purple-500 cH-blue-500 fsz-md p-5"><i class="ti-pencil"></i></a></div>
                                 <div class="peer"><a href="" class="td-n c-red-500 cH-blue-500 fsz-md p-5"><i class="ti-trash"></i></a></div>
                             </div>
                         </li>
                         <li class="bdB peers ai-c jc-sb fxw-nw">
                             <a class="td-n p-20 peers fxw-nw mR-20 peer-greed c-grey-900" href="javascript:void(0);" data-toggle="modal" data-target="#calendar-edit">
                                 <div class="peer mR-15"><i class="fa fa-fw fa-clock-o c-indigo-500"></i></div>
                                 <div class="peer"><span class="fw-600">All Day Event</span>
                                     <div class="c-grey-600"><span class="c-grey-700">Nov 01 - </span><i>Website Development</i></div>
                                 </div>
                             </a>
                             <div class="peers mR-15">
                                 <div class="peer"><a href="" class="td-n c-deep-purple-500 cH-blue-500 fsz-md p-5"><i class="ti-pencil"></i></a></div>
                                 <div class="peer"><a href="" class="td-n c-red-500 cH-blue-500 fsz-md p-5"><i class="ti-trash"></i></a></div>
                             </div>
                         </li>
                         <li class="bdB peers ai-c jc-sb fxw-nw">
                             <a class="td-n p-20 peers fxw-nw mR-20 peer-greed c-grey-900" href="javascript:void(0);" data-toggle="modal" data-target="#calendar-edit">
                                 <div class="peer mR-15"><i class="fa fa-fw fa-clock-o c-green-500"></i></div>
                                 <div class="peer"><span class="fw-600">All Day Event</span>
                                     <div class="c-grey-600"><span class="c-grey-700">Nov 01 - </span><i>Website Development</i></div>
                                 </div>
                             </a>
                             <div class="peers mR-15">
                                 <div class="peer"><a href="" class="td-n c-deep-purple-500 cH-blue-500 fsz-md p-5"><i class="ti-pencil"></i></a></div>
                                 <div class="peer"><a href="" class="td-n c-red-500 cH-blue-500 fsz-md p-5"><i class="ti-trash"></i></a></div>
                             </div>
                         </li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 position-sticky">
            <div id="full-calendar"></div>
        </div>
    </div>
    <div class="modal fade" id="calendar-edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="bd p-15">
                    <h5 class="m-0">Accessories</h5></div>
                <div class="modal-body">
                    <ul id="accessories_list"></ul>
                   {{-- <form>
                        <div class="form-group">
                            <label class="fw-500">Event title</label>
                            <input class="form-control bdc-grey-200">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="fw-500">Start</label>
                                <div class="timepicker-input input-icon form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon bgc-white bd bdwR-0"><i class="ti-calendar"></i></div>
                                        <input type="text" class="form-control bdc-grey-200 start-date" placeholder="Datepicker" data-provide="datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-500">End</label>
                                <div class="timepicker-input input-icon form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon bgc-white bd bdwR-0"><i class="ti-calendar"></i></div>
                                        <input type="text" class="form-control bdc-grey-200 end-date" placeholder="Datepicker" data-provide="datepicker">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="fw-500">Event title</label>
                            <textarea class="form-control bdc-grey-200" rows="5"></textarea>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary cur-p" data-dismiss="modal">Done</button>
                        </div>
                    </form>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var t=new Date, i=t.getDate(), a=t.getMonth(), n=t.getFullYear(), p=[
            // {
            // title: "All Day Event", start: new Date(n, a, 1), desc: "Meetings", bullet: "success,warning,danger",url: '/car/1'
            // }

                @foreach($reservations as $reservation)

                @if(request('status'))
                    @if(request('status') != $reservation->getStatus()) @continue @endif
                @endif
            {
                title: "{{$reservation->user->name}}: {{$reservation->car->model}}", start: new Date("{{$reservation->pick_up_date}}"), end: new Date("{{$reservation->return_date}}"), desc: "{{$reservation->total_price}}€", bullet: "success"
            },
            @endforeach

            // {
            //     title: "Long Event", start: new Date(n, a, i-5), end: new Date(n, a, i-2), desc: "Hangouts", bullet: "success"
            // }
        ];
        calendar("#full-calendar").fullCalendar( {
                events:p, height:800, editable:0, header: {
                    left: "month,agendaWeek,agendaDay", center: "title", right: "today prev,next"
                }
            }
        )
    });

    function openAccessoriesModal(){
        let arr = JSON.parse(this.getAttribute('data-accessories'));

        document.querySelector('#accessories_list').innerHTML = '';
        for(let i in arr){
            document.querySelector('#accessories_list').innerHTML += `<li>${arr[i]}</li>`;
        }

    }
</script>
