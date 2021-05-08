@extends('template.main')

@section('title', 'Chat')

@section('content')
	<div class="full-container">
        <div class="peers fxw-nw pos-r">
            <div class="peer bdR" id="chat-sidebar">
                <div class="layers h-100">
                    <div class="bdB layer w-100">
                        <input type="text" placeholder="Search contacts..." name="chatSearch" class="form-constrol p-15 bdrs-0 w-100 bdw-0">
                    </div>
                    <div id="conversation_div" class="layer w-100 fxg-1 scrollable pos-r">

                    </div>
                </div>
            </div>
            <div class="peer peer-greed" id="chat-box">
                <div class="layers h-100">
                    <div class="layer w-100">
                        <div class="peers fxw-nw jc-sb ai-c pY-20 pX-30 bgc-white">
                            <div class="peers ai-c">
                                <div class="peer d-n@md+"><a href="" title="" id="chat-sidebar-toggle" class="td-n c-grey-900 cH-blue-500 mR-30"><i class="ti-menu"></i></a></div>
                                <div class="peer mR-20"><div id="photo" class="text-center text-dark font-weight-bold p-0 m-0 d-inline-block" style="font-size:15px;vertical-align: center; width: 40px;height:40px;background: cadetblue"></div></div>
                                <div class="peer">
                                    <h6 class="lh-1 mB-0" id="user_name"></h6>{{--<i class="fsz-sm lh-1">Typing...</i>--}}</div>
                            </div>
{{--                            <div class="peers"><a href="" class="peer td-n c-grey-900 cH-blue-500 fsz-md mR-30" title=""><i class="ti-video-camera"></i> </a><a href="" class="peer td-n c-grey-900 cH-blue-500 fsz-md mR-30" title=""><i class="ti-headphone"></i> </a><a href="" class="peer td-n c-grey-900 cH-blue-500 fsz-md" title=""><i class="ti-more"></i></a></div>--}}
                        </div>
                    </div>
                    <div class="layer w-100 fxg-1 bgc-grey-200 scrollable pos-r">
                        <div id="chat" class="p-20 gapY-15">


                        </div>
                    </div>
                    <div class="layer w-100">
                        <div class="p-20 bdT bgc-white">
                            <div class="pos-r">
                                <input id="input_message" type="text" class="form-control bdrs-10em m-0" placeholder="Say something...">
                                <button id="button_send" type="button" class="btn btn-primary bdrs-50p w-2r p-0 h-2r pos-a r-1 t-1"><i class="fa fa-paper-plane-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="template1" hidden>
        <div class="peers fxw-nw ai-c p-20 bdB bgc-white bgcH-grey-50 cur-p">
            <div class="peer"><div id="image" class="text-center text-dark font-weight-bold p-0 m-0 d-inline-block" style="font-size:15px;vertical-align: center; width: 40px;height:40px;background: cadetblue"></div></div>
            <div class="peer peer-greed pL-20">
                <h6 class="mB-0 lh-1 fw-400" id="name">John Doe</h6><small class="lh-1" id="last_message">Online</small></div>
        </div>
    </div>

    <div id="user_template" hidden>
        <div class="peers fxw-nw">
            <div class="peer mR-20"><div id="picture" class="text-center text-dark font-weight-bold p-0 m-0 d-inline-block" style="font-size:14px;vertical-align: center; width: 30px;height:30px;background: cadetblue"></div></div>
            <div class="peer peer-greed">
                <div class="layers ai-fs gapY-5">
                    <div class="layer">
                        <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                            <div class="peer mR-10"><small id="time">10:00 AM</small></div>
                            <div class="peer-greed"><span id="message">Lorem Ipsum is simply dummy text of</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="admin_template" hidden>
        <div class="peers fxw-nw ai-fe">
            <div class="peer ord-1 mL-20"><div id="picture" class="text-center text-dark font-weight-bold p-0 m-0 d-inline-block" style="font-size:14px;vertical-align: center; width: 30px;height:30px;background: #7abaff"></div></div>
            <div class="peer peer-greed ord-0">
                <div class="layers ai-fe gapY-10">
                    <div class="layer">
                        <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                            <div class="peer mL-10 ord-1"><small id="time">10:00 AM</small></div>
                            <div class="peer-greed ord-0"><span id="message">Heloo</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let adminName = "{{auth()->user()->name}}";
        let userName = @json(request('name'));
        let userId = @json(request('user_id'));
        let csrf = "{{ csrf_token() }}"
    </script>

    <script src="{{asset('js/chat_admin.js')}}"></script>

@endsection
