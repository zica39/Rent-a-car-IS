<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
            <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i class="search-icon ti-search pdd-right-10"></i> <i class="search-icon-close ti-close pdd-right-10"></i></a></li>
            <li class="search-input">
                <input class="form-control" type="text" placeholder="Search...">
            </li>
        </ul>
        <ul class="nav-right">
            <li class="notifications dropdown"><span id="msg-count" class="counter bgc-red">0</span> <a href="" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-comment-alt"></i></a>
                <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB"><i class="ti-comment-alt pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Messages</span></li>
                    <li>
                        <ul id="chat_notifications" class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">



                        </ul>
                    </li>
                    <li class="pX-20 pY-15 ta-c bdT"><span><a href="/chat" class="c-grey-600 cH-blue fsz-sm td-n">View All Messages <i class="ti-angle-right fsz-xs mL-10"></i></a></span></li>
                </ul>
            </li>
           {{-- <li class="notifications dropdown"><span class="counter bgc-red">3</span> <a href="" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-bell"></i></a>
                <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB"><i class="ti-bell pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Notifications</span></li>
                    <li>
                        <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                            <li>
                                <a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                    <div class="peer mR-15"><img class="w-3r bdrs-50p" src="https://randomuser.me/api/portraits/men/1.jpg" alt=""></div>
                                    <div class="peer peer-greed"><span><span class="fw-500">John Doe</span> <span class="c-grey-600">liked your <span class="text-dark">post</span></span>
                                        </span>
                                        <p class="m-0"><small class="fsz-xs">5 mins ago</small></p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                    <div class="peer mR-15"><img class="w-3r bdrs-50p" src="https://randomuser.me/api/portraits/men/2.jpg" alt=""></div>
                                    <div class="peer peer-greed"><span><span class="fw-500">Moo Doe</span> <span class="c-grey-600">liked your <span class="text-dark">cover image</span></span>
                                        </span>
                                        <p class="m-0"><small class="fsz-xs">7 mins ago</small></p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                    <div class="peer mR-15"><img class="w-3r bdrs-50p" src="https://randomuser.me/api/portraits/men/3.jpg" alt=""></div>
                                    <div class="peer peer-greed"><span><span class="fw-500">Lee Doe</span> <span class="c-grey-600">commented on your <span class="text-dark">video</span></span>
                                        </span>
                                        <p class="m-0"><small class="fsz-xs">10 mins ago</small></p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pX-20 pY-15 ta-c bdT"><span><a href="" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a></span></li>
                </ul>
            </li>--}}
            <li class="notifications dropdown"><span {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\UserNotification')->count()>0?'':'hidden'}} class="counter bgc-blue">{{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\UserNotification')->count()}}</span> <a href="" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-bell"></i></a>
                <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB"><i class="ti-bell pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Users Notifications</span></li>
                    <li>
                        <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                            @foreach(auth()->user()->unreadNotifications()->where('type', 'App\Notifications\UserNotification')->take(10)->get() as $notification)
                                <li>
                                    <a href="/user/{{$notification->data['id']}}?nid={{$notification->id}}" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                        <div class="peer mR-15"><img class="w-3r bdrs-50p" src="https://randomuser.me/api/portraits/men/1.jpg" alt=""></div>
                                        <div class="peer peer-greed">
                                            <div>
                                                <div class="peers jc-sb fxw-nw mB-5">
                                                    <div class="peer">
                                                        <p class="fw-500 mB-0">{{$notification->data['name']}}</p>
                                                       {{-- <p class="fw-600 mB-0">{{$notification->data['message']}}</p>--}}

                                                    </div>
                                                    <div class="peer"><small class="fsz-xs">{{\App\Models\User::find($notification->data['id'])->getPastTime()}} ago</small></div>
                                                </div><span class="c-grey-600 fsz-sm">{{$notification->data['message']}}...</span></div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="pX-20 pY-15 ta-c bdT"><span><a href="/user" class="c-grey-600 cH-blue fsz-sm td-n">View All Users <i class="fs-xs ti-angle-right mL-10"></i></a></span></li>
                </ul>
            </li>
            <li class="notifications dropdown"><span {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\MailServiceNotification')->count()>0?'':'hidden'}} class="counter bgc-blue">{{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\MailServiceNotification')->count()}}</span> <a href="" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-email"></i></a>
                <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB"><i class="ti-email pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Emails</span></li>
                    <li>
                        <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                            @foreach(auth()->user()->unreadNotifications()->where('type', 'App\Notifications\MailServiceNotification')->take(10)->get() as $notification)
                            <li>
                                <a href="/email?type=inbox&show={{$notification->data['id']}}&nid={{$notification->id}}" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                    <div class="peer mR-15"><img class="w-3r bdrs-50p" src="https://randomuser.me/api/portraits/men/1.jpg" alt=""></div>
                                    <div class="peer peer-greed">
                                        <div>
                                            <div class="peers jc-sb fxw-nw mB-5">
                                                <div class="peer">
                                                    <p class="fw-500 mB-0">{{$notification->data['name']}}</p>
                                                    <p class="fw-600 mB-0">{{$notification->data['subject']}}</p>

                                                </div>
                                                <div class="peer"><small class="fsz-xs">{{\App\Models\MailService::find($notification->data['id'])->getPastTime()}} ago</small></div>
                                            </div><span class="c-grey-600 fsz-sm">{{substr($notification->data['message'],0,35)}}...</span></div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="pX-20 pY-15 ta-c bdT"><span><a href="/email" class="c-grey-600 cH-blue fsz-sm td-n">View All Email <i class="fs-xs ti-angle-right mL-10"></i></a></span></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10"><img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg" alt=""></div>
                    <div class="peer"><span class="fsz-sm c-grey-900">{{auth()->user()->name}}</span></div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-settings mR-10"></i> <span>Setting</span></a></li>
                    <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i> <span>Profile</span></a></li>
                    <li><a href="/email" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-email mR-10"></i> <span>Messages</span></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>

<ul hidden>
    <li id = 'template' hidden>
        <a id='link' href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
            <div class="peer mR-15"><img class="w-3r bdrs-50p" src="https://randomuser.me/api/portraits/men/1.jpg" alt=""></div>
            <div class="peer peer-greed">
                <span id="name" class="font-weight-bold"></span>
                <span id="message"></span>
                <p class="m-0"><small id="time" class="fsz-xs">5 mins ago</small></p>
            </div>
        </a>
    </li>
</ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    window.onload = function (){
        get_notifications('/chat_notification');
    }

    var get_notifications = function (url) {

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function (data) {
                $("#chat_notifications").html('');
                data = JSON.parse(data);

                if(data.length) {
                    $('#msg-count').html(data.length);
                    $('#msg-count').removeAttr('hidden');
                }else{
                    $('#msg-count')[0].setAttribute('hidden','hidden');
                }

                for(let msg of data){

                    let newMsg = $("#template").clone(true);
                    newMsg.find('#name').html( msg.user.name);
                    newMsg.find('#message').html(msg.message);
                    newMsg.find('#link').attr('href',`/chat?user_id=${msg.user_id}&name=${msg.user.name}`);
                    newMsg.find('#time').html(getHumanTime(Date.now() - Date.parse(msg.created_at)) + ' ago');
                    newMsg.removeAttr('hidden');
                    $("#chat_notifications").append(newMsg.html());
                }

                get_notifications('/chat_notification');
            },
            error: function(e){
                console.log(e);
            }
        });
    };


    var getHumanTime = function (timestamp) {

        // Convert to a positive integer
        var time = Math.abs(timestamp);

        // Define humanTime and units
        var humanTime, units;

        // If there are years
        if (time > (1000 * 60 * 60 * 24 * 365)) {
            humanTime = parseInt(time / (1000 * 60 * 60 * 24 * 365), 10);
            units = 'years';
        }

        // If there are months
        else if (time > (1000 * 60 * 60 * 24 * 30)) {
            humanTime = parseInt(time / (1000 * 60 * 60 * 24 * 30), 10);
            units = 'months';
        }

        // If there are weeks
        else if (time > (1000 * 60 * 60 * 24 * 7)) {
            humanTime = parseInt(time / (1000 * 60 * 60 * 24 * 7), 10);
            units = 'weeks';
        }

        // If there are days
        else if (time > (1000 * 60 * 60 * 24)) {
            humanTime = parseInt(time / (1000 * 60 * 60 * 24), 10);
            units = 'days';
        }

        // If there are hours
        else if (time > (1000 * 60 * 60)) {
            humanTime = parseInt(time / (1000 * 60 * 60), 10);
            units = 'hours';
        }

        // If there are minutes
        else if (time > (1000 * 60)) {
            humanTime = parseInt(time / (1000 * 60), 10);
            units = 'minutes';
        }

        // Otherwise, use seconds
        else {
            humanTime = parseInt(time / (1000), 10);
            units = 'seconds';
        }

        return ' '+humanTime + ' ' + units;

    };
</script>
