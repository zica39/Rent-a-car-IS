window.onload = function (){
    get_notifications(userId);
}

let get_notifications = function (user_id) {

    $.ajax({
        url: '/chat_notification_user',
        type: 'POST',
        data: {
            "_token": csrf,
            "user_id": user_id
        },
        success: function (data) {

            if(data>0) {
                $('#notification').removeClass('d-none');
                $('#msg-count').html(data);
                get_messages();
            }else{
                $('#notification').addClass('d-none');
            }

            get_notifications(userId);

        },
        error: function(e){
            console.log(e);
            $('#notification').removeClass('d-none');
            $('#msg-count').parent().html('Connection problem! Try reload page');
        }
    });
};

let get_messages = function (flag) {

    $.ajax({
        url: '/chat',
        type: 'POST',
        data: {
            "_token": csrf
        },
        success: function (data) {
            $("#chat").html('');
            data = JSON.parse(data);
            let newMsgCnt = 0;
            let lastMsg = null;
            let date = null;

            for(let msg of data){

                let date1 = formatDate(new Date(msg.created_at));
                if(date1 != date){
                    $("#chat").append(`<p class="text-center font-weight-bold">${date1}</p>`);
                    date=date1;
                }
                let newMsg = $("#template").clone(true);
                newMsg.find('#name').html(msg.admin?'Rent-a-car':userName);
                newMsg.find('#message').html(msg.message);
                newMsg.find('#time').html( (' '+formatTime(new Date(msg.created_at))));
                newMsg.find('#picture').text(setProfilePicture(msg.admin?'Rent-a-car':userName));

                if(msg.seen === 0 && msg.admin === 1){
                    newMsgCnt++;
                    newMsg.find('#message').addClass('font-weight-bold');
                    lastMsg = newMsg;
                    lastMsg[0].chat_id = msg.id;
                    lastMsg[0].user_id = msg.user_id;
                   // lastMsg[0].children[0].setAttribute('onclick',`seeMessage(${msg.id},${msg.user_id});`)
                }
                newMsg.removeAttr('hidden');
                $("#chat").append(newMsg.html());
            }

            if(lastMsg){
                $('#open_chat')[0].last = lastMsg[0];
            }

            if(newMsgCnt>0 || flag){
                var objDiv = document.getElementById("chat").parentElement;
                objDiv.scrollTop = objDiv.scrollHeight;
            }
        },
        error: function(e){
            console.log(e);
        }
    });
};

$('#chat').on('click', e => {
    seeMessage(Number.MAX_SAFE_INTEGER,userId);
});

$.fn.onEnter = function(func) {
    this.bind('keypress', function(e) {
        if (e.keyCode == 13) func.apply(this, [e]);
    });
    return this;
};

$('#input_message').onEnter( function() {$('#button_send').trigger('click')});

$('#button_send').on('click', e => {

    if(!$('#input_message').val())return false;

    $('#button_send').attr('disabled','disabled');
    $('#input_message').attr('disabled','disabled');

    var msg = $('#input_message').val();


    $.ajax({
        url: '/chat_send',
        type: 'post',
        data: {
            "_token": csrf,
            "name": userName,
            "user_id": userId,
            'message': msg,
            'admin':0
        },
        success: function (res) {
            if(res == true){

                $('#input_message').val("");
                $('#input_message').removeAttr('disabled');
                e.target.removeAttribute('disabled');
                get_messages(true);

            }
        },
        error: function(error){
            console.log(error);
        }
    });

})

$('#open_chat').on('click', e =>{

    e.target.open = !e.target.open;

    if(e.target.open){
        get_messages(true);
    }

})

let seeMessage = function(chat_id,user_id){
    $.ajax({
        url: '/chat_seen',
        type: 'post',
        data: {
            "_token": csrf,
            "chat_id": chat_id,
            "user_id": user_id
        },
        success: function (data) {
            $('#notification')[0].last = null;
        },
        error: function(error){
            console.log(error);
        }
    });
}

let fulldays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


function formatDate(someDateTimeStamp) {
    var dt = dt = new Date(someDateTimeStamp),
        date = dt.getDate(),
        month = months[dt.getMonth()],
        timeDiff = someDateTimeStamp - Date.now(),
        diffDays = new Date().getDate() - date,
        diffYears = new Date().getFullYear() - dt.getFullYear();

    if(diffYears === 0 && diffDays === 0){
        return "Today";
    }else if(diffYears === 0 && diffDays === 1) {
        return "Yesterday";
    }else if(diffYears === 0 && diffDays === -1) {
        return "Tomorrow";
    }else if(diffYears === 0 && (diffDays < -1 && diffDays > -7)) {
        return fulldays[dt.getDay()];
    }else if(diffYears >= 1){
        return month + " " + date + ", " + new Date(someDateTimeStamp).getFullYear();
    }else {
        return month + " " + date;
    }
}

function formatTime(date) { // This is to display 24 hour format like you asked
    let hours = date.getHours();
    let minutes = date.getMinutes();

    hours = hours < 10 ? '0'+hours : hours;
    minutes = minutes < 10 ? '0'+minutes : minutes;

    return  hours + ':' + minutes;
}

function setProfilePicture(name){

    let str = '';

    if(name){
        var y=name.split(' ');
        for( val of y){
            str+= val[0].charAt(0).toUpperCase();
        }
    }
    return str;
}
