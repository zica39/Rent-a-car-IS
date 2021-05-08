<div class="full-container">
    <div class="email-app">
        <div class="email-side-nav remain-height ov-h">
           @include('email.side_bar')
        </div>
        <div class="email-wrapper row remain-height bgc-white ov-h">
            <div class="email-list h-100 layers" style="{{request('show')?'':'width:100%!important;'}}">
                <div class="layer w-100">
                    <div class="bgc-grey-100 peers ai-c jc-sb p-20 fxw-nw">
                        <div class="peer">
                            <div class="btn-group" role="group">
                                <a href="/email?type={{request('type')}}" title="Refresh" class="btn bgc-white bdrs-2 mR-3 cur-p"><i class="fa fa-refresh"></i></a>
                                <form {{request('show')?'':'hidden'}} method="post" action="/email/{{request('show')}}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="type" value="{{request('type')}}">
                                     @if(request('type')!='trash')<button type="submit" {{request('show')?'':'disabled'}} title="Add to important" name="important" value='1' class="btn bgc-white bdrs-2 mR-3 cur-p @if($current){{$current->is_important?'text-warning':''}}"@endif><i class="fa fa-star"></i></button>
                                     @else<button type="submit" {{request('show')?'':'disabled'}} title="Restore from trash" name="restore"  value='2' class="btn bgc-white bdrs-2 mR-3 cur-p"><i class="ti-share"></i></button>@endif
                                    <button type="submit" {{request('show')?'':'disabled'}} title="{{$current?($current->type!='trash'?'Move to trash':'Destroy mail'):''}}" name="delete" onclick="if(this.title=='Destroy mail')if(!confirm('Are you sure?'))event.preventDefault();" value='2' class="btn bgc-white bdrs-2 mR-3 cur-p"><i class="ti-trash"></i></button>
                                </form>
                                {{--<div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn cur-p bgc-white no-after dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>
                                    <ul class="dropdown-menu fsz-sm" aria-labelledby="btnGroupDrop1">
                                        <li><a href="" class="d-b td-n pY-5 pX-10 bgcH-grey-100 c-grey-700"><i class="ti-trash mR-10"></i> <span>Delete</span></a></li>
                                        <li><a href="" class="d-b td-n pY-5 pX-10 bgcH-grey-100 c-grey-700"><i class="ti-alert mR-10"></i> <span>Mark as Spam</span></a></li>
                                        <li><a href="" class="d-b td-n pY-5 pX-10 bgcH-grey-100 c-grey-700"><i class="ti-star mR-10"></i> <span>Star</span></a></li>
                                    </ul>
                                </div>--}}
                            </div>
                        </div>
                        <div class="peer">
                            <div class="btn-group" role="group">
                                {{$mails->links()}}
                                    {{--<button  class="fsz-xs btn bgc-white bdrs-2 mR-3 cur-p"><i class="ti-angle-left"></i></button>
                                    <button type="submit" name="important" class="fsz-xs btn bgc-white bdrs-2 mR-3 cur-p"><i class="ti-angle-right"></i></button>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layer w-100">
                    <div class="bdT bdB">
                        <form>
                            <input type="hidden" name="type" value="{{request('type')}}" >
                        <input type="text" name="q" value="{{request('q')}}" onsubmit="this.form.submit();" class="form-control m-0 bdw-0 pY-15 pX-20" placeholder="Search...">
                        </form>
                    </div>
                </div>
                <div class="layer w-100 fxg-1 scrollable pos-r">
                    <div class="">
                        @forelse($mails as $mail)
                            <div class="email-list-item peers fxw-nw p-20 bdB bgcH-grey-100 cur-p {{$mail->read?'':'bg-light'}}" data-info="{{$mail->toJson()}}" onclick="location.href=href='/email?show={{$mail->id}}&type={{request('type')}}'">
                            <div class="peer mR-10">
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c" onclick="event.stopImmediatePropagation()">
                                    <input disabled type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer" {{request('show') == $mail->id?'checked':''}}>
                                    <label for="inputCall1" class="peers peer-greed js-sb ai-c"></label>
                                </div>
                            </div>
                            <div class="peer peer-greed ov-h">
                                <div class="peers ai-c">
                                    <div class="peer peer-greed">
                                        <h6>{{$mail->is_from?'From:':'To:'}} {{$mail->name}}</h6></div>
                                    <div class="peer"><small>{{$mail->getPastTime()}} ago</small></div>
                                </div>
                                <h5 class="fsz-def tt-c c-grey-900">{{$mail->subject}}</h5><span class="whs-nw w-100 ov-h tov-e d-b">{{$mail->message}}</span></div>
                        </div>
                            @empty
                            <p class="text-center">No replies</p>
                        @endforelse

                    </div>
                </div>
            </div>
            @if(request('show'))
            <div class="email-content h-100">
                <div class="h-100 scrollable pos-r">
                    <div class="bgc-grey-100 peers ai-c jc-sb p-20 fxw-nw d-n@md+">
                        <div class="peer">
                            <div class="btn-group" role="group">
                                <button type="button" class="back-to-mailbox btn bgc-white bdrs-2 mR-3 cur-p"><i class="ti-angle-left"></i></button>
                                <button type="button" class="btn bgc-white bdrs-2 mR-3 cur-p"><i class="ti-folder"></i></button>
                                <button type="button" class="btn bgc-white bdrs-2 mR-3 cur-p"><i class="ti-tag"></i></button>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn cur-p bgc-white no-after dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>
                                    <ul class="dropdown-menu fsz-sm" aria-labelledby="btnGroupDrop1">
                                        <li><a href="" class="d-b td-n pY-5 pX-10 bgcH-grey-100 c-grey-700"><i class="ti-trash mR-10"></i> <span>Delete</span></a></li>
                                        <li><a href="" class="d-b td-n pY-5 pX-10 bgcH-grey-100 c-grey-700"><i class="ti-alert mR-10"></i> <span>Mark as Spam</span></a></li>
                                        <li><a href="" class="d-b td-n pY-5 pX-10 bgcH-grey-100 c-grey-700"><i class="ti-star mR-10"></i> <span>Star</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="peer">
                            <div class="btn-group" role="group">
                                <button type="button" class="fsz-xs btn bgc-white bdrs-2 mR-3 cur-p"><i class="ti-angle-left"></i></button>
                                <button type="button" class="fsz-xs btn bgc-white bdrs-2 mR-3 cur-p"><i class="ti-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="email-content-wrapper">
                        <div class="peers ai-c jc-sb pX-40 pY-30">
                            <div class="peers peer-greed">
                                <div class="peer mR-20"><img class="bdrs-50p w-3r h-3r" alt="" src="https://randomuser.me/api/portraits/men/11.jpg"></div>
                                <div class="peer"><small>{{$current->created_at}}</small>
                                    <h5 class="c-grey-900 mB-5">{{$current->name}}</h5><span>{{$current->is_from?'From:':'To:'}} {{$current->email}}</span></div>
                            </div>
                            @if($current->is_from)<div class="peer"><a href="/email/create?to={{$current->email}}&subject={{$current->subject}}" title="Replay" class="btn btn-danger bdrs-50p p-15 lh-0"><i class="fa fa-reply"></i></a></div>@endif
                        </div>
                        <div class="bdT pX-40 pY-30">
                            <h4>{{$current->subject}}</h4>
                            <p>{{$current->message}}</p>
                        </div>
                    </div>

                </div>
            </div>
            @endif
        </div>
    </div>
</div>
