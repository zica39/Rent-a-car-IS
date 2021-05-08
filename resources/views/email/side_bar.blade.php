<div class="h-100 layers">
    <div class="p-20 bgc-grey-100 layer w-100"><a href="/email/create" class="btn btn-danger btn-block">New Message</a></div>
    <div class="scrollable pos-r bdT layer w-100 fxg-1">
        <ul class="p-20 nav flex-column">
            <li class="nav-item">
                <a href="/email" class="nav-link c-grey-800 cH-blue-500 {{(request('type')==''&& $content=='index')?'bg-light disabled':''}}">
                    <div class="peers ai-c jc-sb">
                        <div class="peer peer-greed"><i class="mR-10 ti-email"></i> <span>Inbox</span></div>
                        <div class="peer"><span class="badge badge-pill bgc-deep-purple-50 c-deep-purple-700">{{$unread>0?'+':''}}{{$unread>0?$unread:''}}</span></div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="/email?type=sent" class="nav-link c-grey-800 cH-blue-500 {{request('type')=='sent'?'bg-light disabled':''}}">
                    <div class="peers ai-c jc-sb">
                        <div class="peer peer-greed"><i class="mR-10 ti-share"></i> <span>Sent</span></div>
                        <div class="peer"><span class="badge badge-pill bgc-green-50 c-green-700"></span></div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="/email?type=important" class="nav-link c-grey-800 cH-blue-500 {{request('type')=='important'?'bg-light disabled':''}}">
                    <div class="peers ai-c jc-sb">
                        <div class="peer peer-greed"><i class="mR-10 ti-star"></i> <span>Important</span></div>
                        <div class="peer"><span class="badge badge-pill bgc-blue-50 c-blue-700"></span></div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="/email?type=drafts" class="nav-link c-grey-800 cH-blue-500 {{request('type')=='drafts'?'bg-light disabled':''}}">
                    <div class="peers ai-c jc-sb">
                        <div class="peer peer-greed"><i class="mR-10 ti-file"></i> <span>Drafts</span></div>
                        <div class="peer"><span class="badge badge-pill bgc-amber-50 c-amber-700"></span></div>
                    </div>
                </a>
            </li>
            {{--<li class="nav-item">
                <a href="" class="nav-link c-grey-800 cH-blue-500">
                    <div class="peers ai-c jc-sb">
                        <div class="peer peer-greed"><i class="mR-10 ti-alert"></i> <span>Spam</span></div>
                        <div class="peer"><span class="badge badge-pill bgc-red-50 c-red-700">1</span></div>
                    </div>
                </a>
            </li>--}}
            <li class="nav-item">
                <a href="/email?type=trash" class="nav-link c-grey-800 cH-blue-500 {{request('type')=='trash'?'bg-light disabled':''}}">
                    <div class="peers ai-c jc-sb">
                        <div class="peer peer-greed"><i class="mR-10 ti-trash"></i> <span>Trash</span></div>
                        <div class="peer"><span class="badge badge-pill bgc-red-50 c-red-700"></span></div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
