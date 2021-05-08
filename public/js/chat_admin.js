$(document).ready( e => {
    get_conversatons('/chat_conversations');
    // setInterval(()=>{get_conversatons('/chat_conversations');},1000);

    //setInterval(()=>{open_chat(userId,userName);},1000);
});


$.fn.onEnter = function(func) {
    this.bind('keypress', function(e) {
        if (e.keyCode == 13) func.apply(this, [e]);
    });
    return this;
};


$('#input_message').onEnter( function() {$('#button_send').trigger('click')});

$('#chat').on('click', e => {
    seenMsg(Number.MAX_SAFE_INTEGER,userId);
});

$('#button_send').on('click', e => {

    if(!$('#input_message').val())return false;

    $('#button_send').attr('disabled','disabled');
    $('#input_message').attr('disabled','disabled');

    var msg = $('#input_message').val();

    if(msg === '')return false;

    $.ajax({
        url: '/chat_send',
        type: 'post',
        data: {
            "_token": csrf,
            "name": userName,
            "user_id": userId,
            'message': msg,
            'admin':1
        },
        success: function (res) {
            if(res == true){


                $('#input_message').val("");
                $('#input_message').removeAttr('disabled');
                e.target.removeAttribute('disabled');

                open_chat(userId,userName,true)

            }
        },
        error: function(error){
            console.log(error);
        }
    });

})

let open_chat = function (user_id,name,flag){
    if(!user_id || !name) return;

    $('#user_name').html(name);
    $('#photo').html(`<p>${setProfilePicture(name)}</p>`);

    userName = name;
    userId = user_id;

    $.ajax({
        url: '/chat_admin',
        type: 'POST',
        data: {
            "_token": csrf,
            "user_id":user_id
        },
        success: function (data) {
            $("#chat").html('');
            data = JSON.parse(data);
            let date = null;
            let someSeen = false;

            for(let msg of data){

                let date1 = formatDate(new Date(msg.created_at));
                if(date1 != date){
                    $("#chat").append(`<p class="text-center font-weight-bold">${date1}</p>`);
                    date=date1;
                }

                if(msg.admin){
                    let newMsg = $("#admin_template").clone(true);
                    newMsg.find('#message').html(msg.message);
                    newMsg.find('#time').html(formatTime(new Date(msg.created_at)));
                    newMsg.find('#picture').text(setProfilePicture(adminName));
                    newMsg.removeAttr('hidden');
                    $("#chat").append(newMsg.html());
                }else{

                    let newMsg = $("#user_template").clone(true);
                    newMsg.find('#message').html(msg.message);
                    newMsg.find('#time').html(formatTime(new Date(msg.created_at)));
                    newMsg.find('#picture').text(setProfilePicture(userName));
                    if(msg.seen === 0 ){
                        newMsg.find('#message').addClass('font-weight-bold');
                        someSeen = true
                    }
                    newMsg.removeAttr('hidden');
                    $("#chat").append(newMsg.html());

                    if(someSeen || flag){
                        var objDiv = document.getElementById("chat").parentElement;
                        objDiv.scrollTop = objDiv.scrollHeight;
                    }

                }

            }

        },
        error: function(e){
            console.log(e);
        }
    });
};

let seenMsg = function (chat_id,user_id){

    $.ajax({
        url: '/chat_seen',
        type: 'post',
        data: {
            "_token": csrf,
            "chat_id": chat_id,
            "user_id": user_id,
            "admin":0
        },
        success: function (data) {
        },
        error: function(error){
            console.log(error);
        }
    });

}


let get_conversatons = function (url) {

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            "_token":csrf
        },
        success: function (data) {
            $("#conversation_div").html('');
            //data = JSON.parse(data);

            for(let msg of data){

                let newMsg = $("#template1").clone(true);
                newMsg.find('#name').html( msg.user.name);
                newMsg.find('#image').text(setProfilePicture(msg.user.name));
                newMsg.find('#last_message').html(msg.message.substr(0,25)+'...');
                if(msg.admin == false && msg.seen == false){
                    newMsg.find('#last_message').addClass('font-weight-bold');
                    if(msg.user_id == userId){
                        open_chat(userId,userName,true)
                    }
                }
                //newMsg[0].id = msg.user_id;
                newMsg[0].children[0].setAttribute('onclick', `open_chat(${msg.user_id},'${msg.user.name}',true);seenMsg(${msg.id},${msg.user_id});`);
                //console.log(newMsg);

                newMsg.removeAttr('hidden');
                $("#conversation_div").append(newMsg.html());
            }

            get_conversatons('/chat_conversations');
        },
        error: function(e){
            console.log(e);
            alert('Connection error, please reload page...')
        }
    });
};

function formatTime(date) { // This is to display 24 hour format like you asked
    let hours = date.getHours();
    let minutes = date.getMinutes();

    hours = hours < 10 ? '0'+hours : hours;
    minutes = minutes < 10 ? '0'+minutes : minutes;

    return  hours + ':' + minutes;
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
