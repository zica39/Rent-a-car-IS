<div class="chat-container container position-fixed bg-light">

   {{-- Template html--}}
    <ul hidden>
        <li id="template" hidden class="left clearfix">
            <div class="chat-body clearfix pr-2 mt-2">
                <div class="header">
                    <div id="picture" class="text-center text-dark font-weight-bold p-0 m-0 d-inline-block"></div>
                    <strong class="primary-font" id="name">Jack Sparrow</strong> <small class="float-right text-muted">
                        <i class="fa fa-clock"></i><span id="time" class="font-weight-bold" ></span></small>
                </div>
                <p class="text-justify" id="message">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                    dolor, quis ullamcorper ligula sodales.
                </p>
            </div>
        </li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <a id='open_chat' type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <span class="fa fa-comments"></span> Chat
                        <span id="notification" class="d-none text-danger ml-2">You have <span id="msg-count">a</span> new message!</span>
                    </a>
                </div>
                <div class="panel-collapse collapse" id="collapseOne">
                    <div class="panel-body">
                        <ul id="chat" class="chat">

                        </ul>
                    </div>
                    <div class="panel-footer mb-1">
                        <div class="input-group">
                            <input type="text" id="input_message" class="form-control input-sm" placeholder="Type your message here..." />
                            <span class="input-group-btn">
                            <button id="button_send" class="btn btn-warning btn-sm m-1" id="btn-chat">
                                Send <i class="fa fa-paper-plane"></i></button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
