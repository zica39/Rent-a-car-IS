<div class="full-container">
    <div class="email-app">
        <div class="email-side-nav remain-height ov-h">
            @include('email.side_bar')
        </div>
        <div class="email-wrapper row remain-height pos-r scrollable bgc-white">
            <div class="email-content open no-inbox-view">
                <div class="email-compose">
                    <div class="d-n@md+ p-20"><a class="email-side-toggle c-grey-900 cH-blue-500 td-n" href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                    <form id="delete_form" method="post" action="/email/{{old('id')}}">@csrf @method('delete')</form>
                    <form method="post" action="/email" class="email-compose-body">
                        @csrf
                        @method('post')
                        <h4 class="c-grey-900 mB-20">Send Message

                            @if(old('id'))<button name='drafts' class="btn btn-danger" form="delete_form" type="submit"><i class="ti-trash"></i></button>@endif
                            <button name='drafts' value="1" class="btn btn-success" type="submit"><i class="ti-save"></i></button>
                        </h4>

                        <div class="send-header">
                            <div class="form-group">
                                <input type="email" class="form-control" name="to" placeholder="To" value="{{request('to')??old('to')}}">
                                @error('to')<div class="invalid-feedback">{{$message}}</div>@enderror
                            </div>
                            {{--<div class="form-group">
                                <input type="text" class="form-control" placeholder="CC">
                            </div>--}}
                            <div class="form-group">
                                <input class="form-control" placeholder="Email Subject" name="subject" value="{{request('subject')??old('subject')}}">
                                @error('subject')<div class="invalid-feedback">{{$message}}</div>@enderror
                            </div>
                            <div class="form-group">
                                <textarea name="message"  class="form-control" placeholder="Message..." rows="10">{{old('message')??''}}</textarea>
                                @error('message')<div class="invalid-feedback">{{$message}}</div>@enderror
                            </div>
                        </div>
                        <div id="compose-area"></div>
                        <div class="text-right mrg-top-30">
{{--                            <input name='drafts' class="btn btn-success" type="submit" value="Save to Drafts"/>--}}
                            <button class="btn btn-danger">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
